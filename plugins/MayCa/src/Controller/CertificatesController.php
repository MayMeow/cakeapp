<?php
namespace MayCa\Controller;

use Cake\Core\Configure;
use Cake\Event\Event;
use Cake\Filesystem\File;
use Cake\Http\Response;
use Cake\Utility\Text;
use MayCa\Controller\AppController;
use MayMeow\Factory\CertificateFactory;

/**
 * Certificates Controller
 *
 * @property \MayCa\Model\Table\CertificatesTable $Certificates
 *
 * @method \MayCa\Model\Entity\Certificate[] paginate($object = null, array $settings = [])
 */
class CertificatesController extends AppController
{

    public function beforeFilter(Event $event)
    {
        parent::beforeFilter($event); // TODO: Change the autogenerated stub

        $this->set('crud_admin_menu', $this->_adminMenu());
    }

    protected function _getDataStorePath()
    {
        $paths = Configure::read('CakeApp.Certificates.paths.ca-data');

        return $paths[0];
    }

    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['ParentCertificates'],
            'order' => ['Certificates.lft' => 'asc']
        ];
        $certificates = $this->paginate($this->Certificates);

        $this->set(compact('certificates'));
        $this->set('_serialize', ['certificates']);
    }

    /**
     * View method
     *
     * @param string|null $id Certificate id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $certificate = $this->Certificates->get($id, [
            'contain' => ['ParentCertificates', 'ChildCertificates']
        ]);

        $caPath = $this->_getDataStorePath();

        if ($certificate->signed) {
            $file['certificate'] = file_get_contents($caPath . $certificate->uid . DS . 'cert.crt');
            $file['key'] = file_get_contents($caPath . $certificate->uid . DS . 'key.pem');
            $file['code'] = file_get_contents($caPath . $certificate->uid . DS . 'code.txt');
            $this->set('signedCertificate', $file);
        }

        $this->set('certificate', $certificate);
        $this->set('_serialize', ['certificate']);
    }

    /**
     * @param $id
     * @param $fileName
     * @return \Cake\Http\Response
     */
    public function downloadCertificate($id, $fileName)
    {
        $certificate = $this->Certificates->get($id);
        $caPath = $this->_getDataStorePath();
        $response = $this->response->withFile($caPath . $certificate->uid . DS . $fileName, ['download' => true, 'name' => $fileName]);

        return $response;
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $certificate = $this->Certificates->newEntity();
        if ($this->request->is('post')) {
            $certificate = $this->Certificates->patchEntity($certificate, $this->request->getData());
            $certificate->uid = Text::uuid();
            $certificate->signed = false;
            if ($this->Certificates->save($certificate)) {
                $this->Flash->success(__('The certificate has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The certificate could not be saved. Please, try again.'));
        }
        $parentCertificates = $this->Certificates->ParentCertificates->find('list', ['limit' => 200]);
        $this->set(compact('certificate', 'parentCertificates'));
        $this->set('_serialize', ['certificate']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Certificate id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $certificate = $this->Certificates->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $certificate = $this->Certificates->patchEntity($certificate, $this->request->getData());
            if ($this->Certificates->save($certificate)) {
                $this->Flash->success(__('The certificate has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The certificate could not be saved. Please, try again.'));
        }
        $parentCertificates = $this->Certificates->ParentCertificates->find('list', ['limit' => 200]);
        $this->set(compact('certificate', 'parentCertificates'));
        $this->set('_serialize', ['certificate']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Certificate id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $certificate = $this->Certificates->get($id);
        if ($this->Certificates->delete($certificate)) {
            $this->Flash->success(__('The certificate has been deleted.'));
        } else {
            $this->Flash->error(__('The certificate could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    /**
     * @param null $id
     * @return \Cake\Http\Response|null
     */
    public function sign($id = null)
    {
        $certificate = $this->Certificates->get($id, [
            'contain' => ['ParentCertificates']
        ]);

        $cf = new CertificateFactory();
        $cf->setDataPath($this->_getDataStorePath());

        // Set certificate information but only if they are not NULL
        // Common Information
        if ($certificate->common_name) $cf->domainName()->setCommonName($certificate->common_name);
        if ($certificate->email) $cf->domainName()->setEmailAddress($certificate->email);

        // Locality information
        if ($certificate->country) $cf->domainName()->setCountryName($certificate->country);
        if ($certificate->locality) $cf->domainName()->setLocalityName($certificate->locality);
        if ($certificate->province) $cf->domainName()->setStateOrProvinceName($certificate->locality);

        // Organization information
        if ($certificate->organization) $cf->domainName()->setOrganizationName($certificate->organization);
        if ($certificate->organization_unit) $cf->domainName()->setOrganizationalUnitName($certificate->organization_unit);

        if ($certificate->type == 'ca') {
            // if certificate is CA self sign
            $cf->setType($certificate->type)
                ->setName($certificate->uid)
                ->sign()->toFile();
        } else if (in_array($certificate->type, ['intermediate', 'user', 'server'])) {

            // other certificates need to be sign by Certification Authority
            $ca_secret = file_get_contents($this->_getDataStorePath() . $certificate->parent_certificate->uid . DS . 'code.txt');

            $cf->setType($certificate->type)
                ->setName($certificate->uid)
                ->setCa($certificate->parent_certificate->uid, $ca_secret) //without www root
                ->sign()->toFile($certificate->type == 'user' ? true : false);
        }

        // check fi exist files
        if ($this->_signedCertificate($certificate)) {
            $certificate->signed = true;
            $this->Certificates->save($certificate);
        }

        return $this->redirect(['action' => 'index']);
    }

    /**
     * method _signedCertificate
     * Check if are all required files was created
     *
     * @param $certificate
     * @return bool
     */
    protected function _signedCertificate($certificate)
    {
        $caPath = $this->_getDataStorePath();

        $files = [
            $caPath . $certificate->uid . DS . 'cert.crt',
            $caPath . $certificate->uid . DS . 'key.pem',
            $caPath . $certificate->uid . DS . 'code.txt'
        ];

        foreach ($files as $file) {
            if(!file_exists($file)) {
                return false;
            }
        }

        return true;
    }
}
