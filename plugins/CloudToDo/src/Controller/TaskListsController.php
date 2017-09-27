<?php
namespace CloudToDo\Controller;

use CloudToDo\Controller\AppController;

/**
 * TaskLists Controller
 *
 * @property \CloudToDo\Model\Table\TaskListsTable $TaskLists
 */
class TaskListsController extends AppController
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
        $taskLists = $this->paginate($this->TaskLists);

        $this->set(compact('taskLists'));
        $this->set('_serialize', ['taskLists']);
    }

    /**
     * View method
     *
     * @param string|null $id Task List id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $taskList = $this->TaskLists->get($id, [
            'contain' => ['Users', 'Tasks']
        ]);

        $this->set('taskList', $taskList);
        $this->set('_serialize', ['taskList']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $taskList = $this->TaskLists->newEntity();
        if ($this->request->is('post')) {
            $taskList = $this->TaskLists->patchEntity($taskList, $this->request->getData());
            if ($this->TaskLists->save($taskList)) {
                $this->Flash->success(__('The task list has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The task list could not be saved. Please, try again.'));
        }
        $users = $this->TaskLists->Users->find('list', ['limit' => 200]);
        $this->set(compact('taskList', 'users'));
        $this->set('_serialize', ['taskList']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Task List id.
     * @return \Cake\Network\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $taskList = $this->TaskLists->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $taskList = $this->TaskLists->patchEntity($taskList, $this->request->getData());
            if ($this->TaskLists->save($taskList)) {
                $this->Flash->success(__('The task list has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The task list could not be saved. Please, try again.'));
        }
        $users = $this->TaskLists->Users->find('list', ['limit' => 200]);
        $this->set(compact('taskList', 'users'));
        $this->set('_serialize', ['taskList']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Task List id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $taskList = $this->TaskLists->get($id);
        if ($this->TaskLists->delete($taskList)) {
            $this->Flash->success(__('The task list has been deleted.'));
        } else {
            $this->Flash->error(__('The task list could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
