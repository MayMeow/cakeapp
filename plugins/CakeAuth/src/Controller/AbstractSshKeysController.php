<?php
namespace CakeAuth\Controller;

use Cake\Event\Event;
use Cake\Filesystem\Folder;
use CakeApp\Shell\Ssh\AuthorizedKeys;
use CakeAuth\Controller\AppController;

/**
 * SshKeys Controller
 *
 * @property \CakeAuth\Model\Table\SshKeysTable $SshKeys
 *
 * @method \CakeAuth\Model\Entity\SshKey[] paginate($object = null, array $settings = [])
 */
abstract class AbstractSshKeysController extends AppController
{
   /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Users']
        ];
        $sshKeys = $this->paginate($this->SshKeys);

        $this->set(compact('sshKeys'));
        $this->set('_serialize', ['sshKeys']);
    }

    /**
     * View method
     *
     * @param string|null $id Ssh Key id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $sshKey = $this->SshKeys->get($id, [
            'contain' => ['Users']
        ]);

        $this->set('sshKey', $sshKey);
        $this->set('_serialize', ['sshKey']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $sshKey = $this->SshKeys->newEntity();
        if ($this->request->is('post')) {
            $sshKey = $this->SshKeys->patchEntity($sshKey, $this->request->getData());
            $sshKey->user_id = $this->Auth->user('id');
            if ($this->SshKeys->save($sshKey)) {
                $this->Flash->success(__('The ssh key has been saved.'));

                $keys = $this->SshKeys->find('list', [
                    'keyField' => 'id',
                    'valueField' => 'public_key',
                ])->toArray();

                AuthorizedKeys::writeKeys($keys);

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The ssh key could not be saved. Please, try again.'));
        }
        $users = $this->SshKeys->Users->find('list', ['limit' => 200]);
        $this->set(compact('sshKey', 'users'));
        $this->set('_serialize', ['sshKey']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Ssh Key id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $sshKey = $this->SshKeys->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $sshKey = $this->SshKeys->patchEntity($sshKey, $this->request->getData());
            if ($this->SshKeys->save($sshKey)) {
                $this->Flash->success(__('The ssh key has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The ssh key could not be saved. Please, try again.'));
        }
        $users = $this->SshKeys->Users->find('list', ['limit' => 200]);
        $this->set(compact('sshKey', 'users'));
        $this->set('_serialize', ['sshKey']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Ssh Key id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $sshKey = $this->SshKeys->get($id);
        if ($this->SshKeys->delete($sshKey)) {
            $this->Flash->success(__('The ssh key has been deleted.'));

            $keys = $this->SshKeys->find('list', [
                'keyField' => 'id',
                'valueField' => 'public_key',
            ])->toArray();

            AuthorizedKeys::writeKeys($keys);

        } else {
            $this->Flash->error(__('The ssh key could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    /**
     * _folderExists method Check if exists folder for upload and if false create one.
     * @param null $folderPath
     */
    protected function _folderExists($folderPath = null) {
        $folder = new Folder('/');
        if (!$folder->cd($folderPath)) {
            $folder->create($folderPath);
        }
    }
}
