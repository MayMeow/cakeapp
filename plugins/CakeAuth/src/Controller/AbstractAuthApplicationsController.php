<?php
namespace CakeAuth\Controller;

use Cake\Event\Event;
use CakeAuth\Controller\AppController;
use MayMeow\Generator\RandomStringGenerator;

/**
 * AuthApplications Controller
 *
 * @property \CakeAuth\Model\Table\AuthApplicationsTable $AuthApplications
 */
class AbstractAuthApplicationsController extends AppController
{

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
        $authApplications = $this->paginate($this->AuthApplications);

        $this->set(compact('authApplications'));
        $this->set('_serialize', ['authApplications']);
    }

    /**
     * View method
     *
     * @param string|null $id Auth Application id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $authApplication = $this->AuthApplications->get($id, [
            'contain' => ['Users', 'AccessTokens']
        ]);

        $this->set('authApplication', $authApplication);
        $this->set('_serialize', ['authApplication']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $authApplication = $this->AuthApplications->newEntity();
        if ($this->request->is('post')) {
            $authApplication = $this->AuthApplications->patchEntity($authApplication, $this->request->getData());
            $authApplication->user_id = $this->Auth->user('id');
            $authApplication->client_key = RandomStringGenerator::generate(25);
            $authApplication->client_secret = RandomStringGenerator::generate(50);
            if ($this->AuthApplications->save($authApplication)) {
                $this->Flash->success(__('The auth application has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The auth application could not be saved. Please, try again.'));
        }
        $users = $this->AuthApplications->Users->find('list', ['limit' => 200]);
        $this->set(compact('authApplication', 'users'));
        $this->set('_serialize', ['authApplication']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Auth Application id.
     * @return \Cake\Network\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $authApplication = $this->AuthApplications->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $authApplication = $this->AuthApplications->patchEntity($authApplication, $this->request->getData());
            if ($this->AuthApplications->save($authApplication)) {
                $this->Flash->success(__('The auth application has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The auth application could not be saved. Please, try again.'));
        }
        $users = $this->AuthApplications->Users->find('list', ['limit' => 200]);
        $this->set(compact('authApplication', 'users'));
        $this->set('_serialize', ['authApplication']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Auth Application id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $authApplication = $this->AuthApplications->get($id);
        if ($this->AuthApplications->delete($authApplication)) {
            $this->Flash->success(__('The auth application has been deleted.'));
        } else {
            $this->Flash->error(__('The auth application could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
