<?php
namespace CakeNetworking\Controller;

use CakeNetworking\Controller\AppController;
use MayMeow\IO\Arrays\HashMap;

/**
 * DnsValues Controller
 *
 * @property \CakeNetworking\Model\Table\DnsValuesTable $DnsValues
 */
class DnsValuesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['DnsRecordSets']
        ];
        $dnsValues = $this->paginate($this->DnsValues);

        $this->set(compact('dnsValues'));
        $this->set('_serialize', ['dnsValues']);
    }

    /**
     * View method
     *
     * @param string|null $id Dns Value id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $dnsValue = $this->DnsValues->get($id, [
            'contain' => ['DnsRecordSets']
        ]);

        $this->set('dnsValue', $dnsValue);
        $this->set('_serialize', ['dnsValue']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $dnsValue = $this->DnsValues->newEntity();
        if ($this->request->is('post')) {
            $dnsValue = $this->DnsValues->patchEntity($dnsValue, $this->request->data);
            if ($this->DnsValues->save($dnsValue)) {
                $this->Flash->success(__('The dns value has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The dns value could not be saved. Please, try again.'));
        }

        $dnsRecordSets = $this->_getDnsRecordSets();

        $this->set(compact('dnsValue', 'dnsRecordSets'));
        $this->set('_serialize', ['dnsValue']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Dns Value id.
     * @return \Cake\Network\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $dnsValue = $this->DnsValues->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $dnsValue = $this->DnsValues->patchEntity($dnsValue, $this->request->data);
            if ($this->DnsValues->save($dnsValue)) {
                $this->Flash->success(__('The dns value has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The dns value could not be saved. Please, try again.'));
        }
        $dnsRecordSets = $this->DnsValues->DnsRecordSets->find('list', ['limit' => 200]);
        $this->set(compact('dnsValue', 'dnsRecordSets'));
        $this->set('_serialize', ['dnsValue']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Dns Value id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $dnsValue = $this->DnsValues->get($id);
        if ($this->DnsValues->delete($dnsValue)) {
            $this->Flash->success(__('The dns value has been deleted.'));
        } else {
            $this->Flash->error(__('The dns value could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    /**
     * @return array
     */
    protected function _getDnsRecordSets()
    {
        $dnsRecordSets = new HashMap();
        $dnsRecordSetsTable = $this->DnsValues->DnsRecordSets->find()
            ->contain(['Domains'])
            ->limit(200);

        foreach ($dnsRecordSetsTable as $item)
        {
            $dnsRecordSets->put($item->id, $item->dns_name . '.' . $item->domain->name . ' ' . $item->type);
        }

        return $dnsRecordSets->toArray();
    }
}
