<?php
namespace CakeResource\Controller;

use CakeResource\Controller\AppController;

/**
 * OwnedResources Controller
 *
 * @property \MCloudResources\Model\Table\OwnedResourcesTable $OwnedResources
 */
abstract class AbstractOwnedResourcesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['ResourceGroups', 'ResourceClasses', 'Users']
        ];
        $ownedResources = $this->paginate($this->OwnedResources);

        $this->set(compact('ownedResources'));
        $this->set('_serialize', ['ownedResources']);
    }

    /**
     * View method
     *
     * @param string|null $id Owned Resource id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $ownedResource = $this->OwnedResources->get($id, [
            'contain' => ['ResourceGroups', 'ResourceClasses', 'Users']
        ]);

        $this->set('ownedResource', $ownedResource);
        $this->set('_serialize', ['ownedResource']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $ownedResource = $this->OwnedResources->newEntity();
        if ($this->request->is('post')) {
            $ownedResource = $this->OwnedResources->patchEntity($ownedResource, $this->request->data);
            if ($this->OwnedResources->save($ownedResource)) {
                $this->Flash->success(__('The owned resource has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The owned resource could not be saved. Please, try again.'));
        }
        $resourceGroups = $this->OwnedResources->ResourceGroups->find('list', ['limit' => 200]);
        $resourceClasses = $this->OwnedResources->ResourceClasses->find('list', ['limit' => 200]);
        $users = $this->OwnedResources->Users->find('list', ['limit' => 200]);
        $this->set(compact('ownedResource', 'resourceGroups', 'resourceClasses', 'users'));
        $this->set('_serialize', ['ownedResource']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Owned Resource id.
     * @return \Cake\Network\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $ownedResource = $this->OwnedResources->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $ownedResource = $this->OwnedResources->patchEntity($ownedResource, $this->request->data);
            if ($this->OwnedResources->save($ownedResource)) {
                $this->Flash->success(__('The owned resource has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The owned resource could not be saved. Please, try again.'));
        }
        $resourceGroups = $this->OwnedResources->ResourceGroups->find('list', ['limit' => 200]);
        $resourceClasses = $this->OwnedResources->ResourceClasses->find('list', ['limit' => 200]);
        $users = $this->OwnedResources->Users->find('list', ['limit' => 200]);
        $this->set(compact('ownedResource', 'resourceGroups', 'resourceClasses', 'users'));
        $this->set('_serialize', ['ownedResource']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Owned Resource id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $ownedResource = $this->OwnedResources->get($id);
        if ($this->OwnedResources->delete($ownedResource)) {
            $this->Flash->success(__('The owned resource has been deleted.'));
        } else {
            $this->Flash->error(__('The owned resource could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
