<?php

namespace MCloudHome\Controller;

use Cake\Core\Configure;
use Cake\Event\Event;
use MayMeow\Crud\View\Menu\MenuItem;
use MayMeow\Db\MayDb;
use MayMeow\Generator\RandomStringGenerator;
use MayMeow\Templates\Config\AgentConfig;
use MayMeow\Templates\Config\OutgoingActionConfig;

/**
 * Devices Controller
 *
 * @property \MCloudHome\Model\Table\DevicesTable $Devices
 */
abstract class AbstractDevicesController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $devices = $this->paginate($this->Devices);

        $this->set(compact('devices'));
        $this->set('_serialize', ['devices']);
    }

    /**
     * View method
     *
     * @param string|null $id Device id.
     * @param string|null $element Element To load
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null, $element = 'streams')
    {
        $device = $this->Devices->get($id, [
            'contain' => []
        ]);

        $registerTemplate = new AgentConfig();

        $registerTemplate
            ->setAppKey($device->app_key)
            ->setVersion('1')
            ->setAppSecret($device->app_secret)
            ->setServer(Configure::read('CodeAdvent.externalUrl'));

        $mayDb = new MayDb();

        $streams = $mayDb->getKind('streams')->all();

        $this->set('streams', json_decode($streams));

        $this->set('view_part', $element);
        $this->set('configuration', $registerTemplate->serialize());
        $this->set('device', $device);
        $this->set('_serialize', ['device', 'streams']);
    }



    /**
     * @param null $id
     * @return \Cake\Http\Response|null
     */
    public function play($id = null, $key = null)
    {
        $device = $this->Devices->get($id, [
            'contain' => []
        ]);

        $mayDb = new MayDb();

        $result = $mayDb->getKind('streams')
            ->filter('key', $key)
            ->first();

        $streams = json_decode($result);

        $payload = new OutgoingActionConfig();
        $payload
            ->setAction('Play')
            ->setData([
                'url' => $streams->entities[0]->url,
                'volume' => '-602'
            ]);

        $this->_createAction($payload, $device->app_key, $device->app_secret);

        return $this->redirect($this->referer());
    }

    /**
     * @param null $id
     * @return \Cake\Http\Response|null
     */
    public function stop($id = null)
    {
        $device = $this->Devices->get($id, [
            'contain' => []
        ]);

        $payload = new OutgoingActionConfig();
        $payload
            ->setAction('Stop');

        $this->_createAction($payload, $device->app_key, $device->app_secret);

        return $this->redirect($this->referer());
    }

    /**
     * @param OutgoingActionConfig|null $payload
     * @param null $appKey
     * @param null $appSecret
     */
    protected function _createAction(OutgoingActionConfig $payload = null, $appKey = null, $appSecret = null)
    {
        $outgoingAction = $this->loadModel('MCloudCompute.OutgoingActions');
        $newAction = $outgoingAction->newEntity();

        $newAction->app_key = $appKey;
        $newAction->app_secret = $appSecret;
        $newAction->status = 'waiting';
        $newAction->payload = $payload->serialize();

        $outgoingAction->save($newAction);
    }
}
