<?php
namespace CakeNetworking\Controller;

use Cake\Core\Configure;
use Cake\Event\Event;
use CakeNetworking\Controller\AppController;

/**
 * ContentDeliveryNetworks Controller
 *
 * @property \CakeNetworking\Model\Table\ContentDeliveryNetworksTable $ContentDeliveryNetworks
 */
class ContentDeliveryNetworksController extends AppController
{

    public function initialize()
    {
        parent::initialize();
        $this->loadComponent('RequestHandler');
    }

    public function beforeFilter(Event $event)
    {
        parent::beforeFilter($event);
        $this->Auth->allow(['delivery']);
    }

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Buckets', 'Users']
        ];
        $contentDeliveryNetworks = $this->paginate($this->ContentDeliveryNetworks);

        $this->set(compact('contentDeliveryNetworks'));
        $this->set('_serialize', ['contentDeliveryNetworks']);
    }

    /**
     * View method
     *
     * @param string|null $id Content Delivery Network id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $contentDeliveryNetwork = $this->ContentDeliveryNetworks->get($id, [
            'contain' => ['Buckets', 'Users']
        ]);

        $externalUrl = Configure::read('CodeAdvent.externalUrl');
        $this->set('externalUrl', $externalUrl);
        $this->set('contentDeliveryNetwork', $contentDeliveryNetwork);
        $this->set('_serialize', ['contentDeliveryNetwork']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $contentDeliveryNetwork = $this->ContentDeliveryNetworks->newEntity();
        if ($this->request->is('post')) {
            $contentDeliveryNetwork = $this->ContentDeliveryNetworks->patchEntity($contentDeliveryNetwork, $this->request->data);
            $contentDeliveryNetwork->user_id = $this->Auth->user('id');
            if ($this->ContentDeliveryNetworks->save($contentDeliveryNetwork)) {
                $this->Flash->success(__('The content delivery network has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The content delivery network could not be saved. Please, try again.'));
            }
        }
        $buckets = $this->ContentDeliveryNetworks->Buckets->find('list', ['limit' => 200]);
        $users = $this->ContentDeliveryNetworks->Users->find('list', ['limit' => 200]);
        $this->set(compact('contentDeliveryNetwork', 'buckets', 'users'));
        $this->set('_serialize', ['contentDeliveryNetwork']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Content Delivery Network id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $contentDeliveryNetwork = $this->ContentDeliveryNetworks->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $contentDeliveryNetwork = $this->ContentDeliveryNetworks->patchEntity($contentDeliveryNetwork, $this->request->data);
            if ($this->ContentDeliveryNetworks->save($contentDeliveryNetwork)) {
                $this->Flash->success(__('The content delivery network has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The content delivery network could not be saved. Please, try again.'));
            }
        }
        $buckets = $this->ContentDeliveryNetworks->Buckets->find('list', ['limit' => 200]);
        $users = $this->ContentDeliveryNetworks->Users->find('list', ['limit' => 200]);
        $this->set(compact('contentDeliveryNetwork', 'buckets', 'users'));
        $this->set('_serialize', ['contentDeliveryNetwork']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Content Delivery Network id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $contentDeliveryNetwork = $this->ContentDeliveryNetworks->get($id);
        if ($this->ContentDeliveryNetworks->delete($contentDeliveryNetwork)) {
            $this->Flash->success(__('The content delivery network has been deleted.'));
        } else {
            $this->Flash->error(__('The content delivery network could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    /**
     * @param null $path
     * @return \Cake\Network\Response|null
     */
    public function delivery($path = null)
    {
        //$this->viewBuilder()->className('json');
        $id = $this->request->id;
        $contentDeliveryNetwork = $this->ContentDeliveryNetworks->get($id, [
            'contain' => ['Buckets', 'Users']
        ]);

        // build path with bucket UID and requested path of file
        $bucketPath =  WWW_ROOT . 'data' . DS . 'storage' . DS . 'buckets' . DS . $contentDeliveryNetwork->bucket->uid;
        $file = $bucketPath . DS . $path;
        $this->response->file($file);

        return $this->response;
    }
}
