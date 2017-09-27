<?php
namespace CakeAuth\Controller;

use Cake\Auth\DefaultPasswordHasher;
use CakeAuth\Controller\AppController;
use MayMeow\Generator\RandomStringGenerator;

/**
 * AccessTokens Controller
 *
 * @property \CakeAuth\Model\Table\AccessTokensTable $AccessTokens
 */
class AccessTokensController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Users', 'AuthApplications']
        ];
        $accessTokens = $this->paginate($this->AccessTokens);

        $this->set(compact('accessTokens'));
        $this->set('_serialize', ['accessTokens']);
    }

    /**
     * View method
     *
     * @param string|null $id Access Token id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $accessToken = $this->AccessTokens->get($id, [
            'contain' => ['Users', 'AuthApplications']
        ]);

        $this->set('accessToken', $accessToken);
        $this->set('_serialize', ['accessToken']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $accessToken = $this->AccessTokens->newEntity();
        if ($this->request->is('post')) {
            $accessToken = $this->AccessTokens->patchEntity($accessToken, $this->request->getData());
            $accessToken->token = RandomStringGenerator::generate(70);
            $accessToken->expires = strtotime('+1 month', time());
            if ($this->AccessTokens->save($accessToken)) {
                $this->Flash->success(__('The access token has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The access token could not be saved. Please, try again.'));
        }
        $users = $this->AccessTokens->Users->find('list', ['limit' => 200]);
        $authApplications = $this->AccessTokens->AuthApplications->find('list', ['limit' => 200]);
        $this->set(compact('accessToken', 'users', 'authApplications'));
        $this->set('_serialize', ['accessToken']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Access Token id.
     * @return \Cake\Network\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $accessToken = $this->AccessTokens->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $accessToken = $this->AccessTokens->patchEntity($accessToken, $this->request->getData());
            if ($this->AccessTokens->save($accessToken)) {
                $this->Flash->success(__('The access token has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The access token could not be saved. Please, try again.'));
        }
        $users = $this->AccessTokens->Users->find('list', ['limit' => 200]);
        $authApplications = $this->AccessTokens->AuthApplications->find('list', ['limit' => 200]);
        $this->set(compact('accessToken', 'users', 'authApplications'));
        $this->set('_serialize', ['accessToken']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Access Token id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $accessToken = $this->AccessTokens->get($id);
        if ($this->AccessTokens->delete($accessToken)) {
            $this->Flash->success(__('The access token has been deleted.'));
        } else {
            $this->Flash->error(__('The access token could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
