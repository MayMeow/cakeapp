<?php
namespace MCloudCompute\Controller;

use Cake\Event\Event;
use MayMeow\Crud\View\Menu\MenuItem;
use MCloudCompute\Controller\AppController;

/**
 * OutgoingActions Controller
 *
 * @property \MCloudCompute\Model\Table\OutgoingActionsTable $OutgoingActions
 */
class OutgoingActionsController extends AppController
{

    public function beforeFilter(Event $event)
    {
        parent::beforeFilter($event); // TODO: Change the autogenerated stub

        $this->set('crud_admin_menu', $this->_adminMenu());
    }

    protected function _adminMenu()
    {
        return [
            new MenuItem('<i class="fa fa-snowflake-o"></i> Containers', ['controller' => 'Containers', 'action' => 'index'], ['escape' => false]),
            //new MenuItem('<i class="fa fa-files-o"></i> Images', ['controller' => 'Containers', 'action' => 'index'], ['escape' => false]),
            //new MenuItem('<i class="fa fa-sitemap"></i> Networks', ['controller' => 'Containers', 'action' => 'index'], ['escape' => false]),
            //new MenuItem('<i class="fa fa-hdd-o"></i> Volumes', ['controller' => 'Containers', 'action' => 'index'], ['escape' => false]),
            new MenuItem('<i class="fa fa-bolt"></i> Outgoing actions', ['controller' => 'OutgoingActions', 'action' => 'index'], ['escape' => false])
        ];
    }

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $outgoingActions = $this->paginate($this->OutgoingActions);

        $this->set(compact('outgoingActions'));
        $this->set('_serialize', ['outgoingActions']);
    }

    /**
     * View method
     *
     * @param string|null $id Outgoing Action id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $outgoingAction = $this->OutgoingActions->get($id, [
            'contain' => []
        ]);

        $this->set('outgoingAction', $outgoingAction);
        $this->set('_serialize', ['outgoingAction']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $outgoingAction = $this->OutgoingActions->newEntity();
        if ($this->request->is('post')) {
            $outgoingAction = $this->OutgoingActions->patchEntity($outgoingAction, $this->request->getData());
            if ($this->OutgoingActions->save($outgoingAction)) {
                $this->Flash->success(__('The outgoing action has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The outgoing action could not be saved. Please, try again.'));
        }
        $this->set(compact('outgoingAction'));
        $this->set('_serialize', ['outgoingAction']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Outgoing Action id.
     * @return \Cake\Network\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $outgoingAction = $this->OutgoingActions->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $outgoingAction = $this->OutgoingActions->patchEntity($outgoingAction, $this->request->getData());
            if ($this->OutgoingActions->save($outgoingAction)) {
                $this->Flash->success(__('The outgoing action has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The outgoing action could not be saved. Please, try again.'));
        }
        $this->set(compact('outgoingAction'));
        $this->set('_serialize', ['outgoingAction']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Outgoing Action id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $outgoingAction = $this->OutgoingActions->get($id);
        if ($this->OutgoingActions->delete($outgoingAction)) {
            $this->Flash->success(__('The outgoing action has been deleted.'));
        } else {
            $this->Flash->error(__('The outgoing action could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
