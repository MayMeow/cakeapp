<?php
namespace CakeConfigure\Controller;

use CakeConfigure\Controller\AppController;
use CakeConfigure\Factory\CakeAppConfigure;
use CakeApp\Component\Licensing\Controller\LicenseController;
use CakeApp\Component\Licensing\Factory\LicenseFactory;
use CakeApp\Component\Licensing\Helper\LicenseHelper;

/**
 * ApplicationSettings Controller
 *
 * @property \CakeConfigure\Model\Table\ApplicationSettingsTable $ApplicationSettings
 *
 * @method \CakeConfigure\Model\Entity\ApplicationSetting[] paginate($object = null, array $settings = [])
 */
abstract class AbstractApplicationSettingsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $applicationSettings = $this->paginate($this->ApplicationSettings);

        $lf = LicenseFactory::read();
        $this->set('test', $lf);

        $this->set(compact('applicationSettings'));
        $this->set('_serialize', ['applicationSettings']);
    }

    /**
     * View method
     *
     * @param string|null $id Application Setting id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $applicationSetting = $this->ApplicationSettings->get($id, [
            'contain' => []
        ]);

        $this->set('applicationSetting', $applicationSetting);
        $this->set('_serialize', ['applicationSetting']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $applicationSetting = $this->ApplicationSettings->newEntity();
        if ($this->request->is('post')) {
            $applicationSetting = $this->ApplicationSettings->patchEntity($applicationSetting, $this->request->getData());
            if ($this->ApplicationSettings->save($applicationSetting)) {
                $this->Flash->success(__('The application setting has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The application setting could not be saved. Please, try again.'));
        }
        $this->set(compact('applicationSetting'));
        $this->set('_serialize', ['applicationSetting']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Application Setting id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $applicationSetting = $this->ApplicationSettings->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $applicationSetting = $this->ApplicationSettings->patchEntity($applicationSetting, $this->request->getData());
            if ($this->ApplicationSettings->save($applicationSetting)) {
                $this->Flash->success(__('The application setting has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The application setting could not be saved. Please, try again.'));
        }
        $this->set(compact('applicationSetting'));
        $this->set('_serialize', ['applicationSetting']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Application Setting id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $applicationSetting = $this->ApplicationSettings->get($id);
        if ($this->ApplicationSettings->delete($applicationSetting)) {
            $this->Flash->success(__('The application setting has been deleted.'));
        } else {
            $this->Flash->error(__('The application setting could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
