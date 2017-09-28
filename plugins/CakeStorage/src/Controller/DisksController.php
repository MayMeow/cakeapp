<?php
namespace CakeStorage\Controller;

use Cake\Core\Configure;
use Cake\Event\Event;
use Cake\Filesystem\File;
use Cake\Filesystem\Folder;
use CakeStorage\Controller\AppController;
use MayMeow\Resources\ResourcesManager;

/**
 * Disks Controller
 *
 * @property \CakeStorage\Model\Table\DisksTable $Disks
 */
class DisksController extends AppController
{
    public function beforeFilter(Event $event)
    {
        parent::beforeFilter($event); // TODO: Change the autogenerated stub
        $this->Auth->allow(['add', 'index', 'view']);

        $this->set('crud_admin_menu', $this->_adminMenu());
    }

    public function isAuthorized($user) : bool
    {
        // Allow all users to list, view and add projects
        if (in_array($this->request->getParam('action'), ['view', 'add', 'index'])){
            if (isset($user['role']) && $user['role'] === 'user') {
                return true;
            }
        }

        if (in_array($this->request->getParam('action'), ['edit', 'delete'])){
            $id = $this->request->getParam('pass.0');
            if ($this->Disks->isOwnedBy($id, $user['id'])) {
                return true;
            }
        }

        return parent::isAuthorized($user); // TODO: Change the autogenerated stub
    }

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Users']
        ];
        $disks = $this->paginate($this->Disks);

        $this->set(compact('disks'));
        $this->set('_serialize', ['disks']);
    }

    /**
     * View method
     *
     * @param string|null $id Disk id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null, $folder = null)
    {
        $disk = $this->Disks->get($id, [
            'contain' => ['Users']
        ]);

        $this->_folderExists(WWW_ROOT . 'data' . DS . 'storage' . DS . 'disks' . DS . $disk->uid . DS . '_data', '0777');

        if ($folder == null) {
            $dir = new Folder(WWW_ROOT . 'data' . DS . 'storage' . DS . 'disks' . DS . $disk->uid . DS . '_data');
        } else {
            $dir = new Folder(WWW_ROOT . 'data' . DS . 'storage' . DS . 'disks' . DS . $disk->uid . DS . '_data' . DS . $folder);
        }

        $files = $dir->read();
        $size = $dir->dirsize();
        $pwd = $dir->pwd();

        $found_files = [];

        foreach ($files[1] as $file) {
            $file = new File($dir->pwd() . DS .$file);
            $found_files[] = $file->info();
            // $file->write('I am overwriting the contents of this file');
            // $file->append('I am adding to the bottom of this file.');
            // $file->delete(); // I am deleting this file
            $file->close(); // Be sure to close the file when you're done
        }

        $price = Configure::read('CakeStorage.diskPrice') * $disk->size;

        $this->set('pwd', $pwd);
        $this->set('price', $price);
        $this->set('dirsize', $size);
        $this->set('files', $found_files);
        $this->set('dirs', $files[0]);
        $this->set('disk', $disk);
        $this->set('_serialize', ['disk']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $disk = $this->Disks->newEntity();
        if ($this->request->is('post')) {
            $disk = $this->Disks->patchEntity($disk, $this->request->data);
            $disk->uid = '';
            $disk->user_id = $this->Auth->user('id');
            $disk->state = 'IN_SERVICE';

            if ($this->Disks->save($disk)) {
                //create data folder after creation bucket
                $this->_folderExists(WWW_ROOT . 'data' . DS . 'storage' . DS . 'disks' . DS . $disk->uid);
                $this->Flash->success(__('The disk has been saved.'));

                // $resourceManager = new ResourcesManager();
                //
                // $response = $resourceManager->create([
                //     'name' => $disk->name,
                //     'resourceClass'=> 'CakeStorage.Disks',
                //     'userId' => $this->Auth->user('id'),
                //     'instanceKey' => $disk->id,
                //     'resourceGroup' => $disk->resource_group
                // ]);

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The disk could not be saved. Please, try again.'));
        }
        //$users = $this->Disks->Users->find('list', ['limit' => 200]);
        $groupsModel = $this->loadModel('McloudResources.ResourceGroups');
        $groups = $groupsModel->find('list', ['limit' => 200]);
        $this->set(compact('disk', 'groups'));
        $this->set('_serialize', ['disk']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Disk id.
     * @return \Cake\Network\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $disk = $this->Disks->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $disk = $this->Disks->patchEntity($disk, $this->request->data);
            if ($this->Disks->save($disk)) {
                $this->Flash->success(__('The disk has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The disk could not be saved. Please, try again.'));
        }
        $users = $this->Disks->Users->find('list', ['limit' => 200]);
        $this->set(compact('disk', 'users'));
        $this->set('_serialize', ['disk']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Disk id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $disk = $this->Disks->get($id);
        if ($this->Disks->delete($disk)) {
            $this->Flash->success(__('The disk has been deleted.'));
        } else {
            $this->Flash->error(__('The disk could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    /**
     * _folderExists method Check if exists folder for upload and if false create one.
     * @param null $folderPath
     * @param null $chmod;
     */
    private function _folderExists($folderPath = null, $chmod = null) {
        $folder = new Folder('/');
        if (!$folder->cd($folderPath)) {
            $folder->create($folderPath);
            // first time you create folder set chmod to 0777
            if($chmod) {
                $folder->chmod($folderPath, $chmod, true);
            }
        }
    }
}