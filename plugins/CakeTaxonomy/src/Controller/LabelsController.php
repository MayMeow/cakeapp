<?php
namespace CakeTaxonomy\Controller;

use CakeTaxonomy\Controller\AppController;

/**
 * Labels Controller
 *
 * @property \CakeTaxonomy\Model\Table\LabelsTable $Labels
 *
 * @method \CakeTaxonomy\Model\Entity\Label[] paginate($object = null, array $settings = [])
 */
class LabelsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $labels = $this->paginate($this->Labels);

        $this->set(compact('labels'));
        $this->set('_serialize', ['labels']);
    }

    /**
     * View method
     *
     * @param string|null $id Label id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $label = $this->Labels->get($id, [
            'contain' => []
        ]);

        $this->set('label', $label);
        $this->set('_serialize', ['label']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $label = $this->Labels->newEntity();
        if ($this->request->is('post')) {
            $label = $this->Labels->patchEntity($label, $this->request->getData());
            if ($this->Labels->save($label)) {
                $this->Flash->success(__('The label has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The label could not be saved. Please, try again.'));
        }
        $this->set(compact('label'));
        $this->set('_serialize', ['label']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Label id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $label = $this->Labels->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $label = $this->Labels->patchEntity($label, $this->request->getData());
            if ($this->Labels->save($label)) {
                $this->Flash->success(__('The label has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The label could not be saved. Please, try again.'));
        }
        $this->set(compact('label'));
        $this->set('_serialize', ['label']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Label id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $label = $this->Labels->get($id);
        if ($this->Labels->delete($label)) {
            $this->Flash->success(__('The label has been deleted.'));
        } else {
            $this->Flash->error(__('The label could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
