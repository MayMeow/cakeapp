<?php
namespace CakeNetworking\Controller;

use CakeNetworking\Controller\AppController;

/**
 * DnsRecordSets Controller
 *
 * @property \CakeNetworking\Model\Table\DnsRecordSetsTable $DnsRecordSets
 */
class DnsRecordSetsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Domains', 'DnsValues'],
            'order' => ['DnsRecordSets.type ASC']
        ];
        $dnsRecordSets = $this->paginate($this->DnsRecordSets);

        $this->set(compact('dnsRecordSets'));
        $this->set('_serialize', ['dnsRecordSets']);
    }

    /**
     * View method
     *
     * @param string|null $id Dns Record Set id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $dnsRecordSet = $this->DnsRecordSets->get($id, [
            'contain' => ['Domains', 'DnsValues']
        ]);

        $this->set('dnsRecordSet', $dnsRecordSet);
        $this->set('_serialize', ['dnsRecordSet']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $dnsRecordSet = $this->DnsRecordSets->newEntity();
        if ($this->request->is('post')) {
            $dnsRecordSet = $this->DnsRecordSets->patchEntity($dnsRecordSet, $this->request->data);
            if ($this->DnsRecordSets->save($dnsRecordSet)) {
                $this->Flash->success(__('The dns record set has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The dns record set could not be saved. Please, try again.'));
        }
        $domains = $this->DnsRecordSets->Domains->find('list', ['limit' => 200]);
        $recordTypes = [
            'A' => 'A',
            'AAAA' => 'AAAA',
            'CAA' => 'CAA',
            'CNAME' => 'CNAME',
            'MX' => 'MX',
            'NAPTR' => 'NAPTR',
            'NS' => 'NS',
            'PTR' => 'PTR',
            'SPF' => 'SPF',
            'SRV' => 'SRV',
            'TXT' => 'TXT'
        ];
        $this->set(compact('dnsRecordSet', 'domains', 'recordTypes'));
        $this->set('_serialize', ['dnsRecordSet']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Dns Record Set id.
     * @return \Cake\Network\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $dnsRecordSet = $this->DnsRecordSets->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $dnsRecordSet = $this->DnsRecordSets->patchEntity($dnsRecordSet, $this->request->data);
            if ($this->DnsRecordSets->save($dnsRecordSet)) {
                $this->Flash->success(__('The dns record set has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The dns record set could not be saved. Please, try again.'));
        }
        $domains = $this->DnsRecordSets->Domains->find('list', ['limit' => 200]);
        $this->set(compact('dnsRecordSet', 'domains'));
        $this->set('_serialize', ['dnsRecordSet']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Dns Record Set id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $dnsRecordSet = $this->DnsRecordSets->get($id);
        if ($this->DnsRecordSets->delete($dnsRecordSet)) {
            $this->Flash->success(__('The dns record set has been deleted.'));
        } else {
            $this->Flash->error(__('The dns record set could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
