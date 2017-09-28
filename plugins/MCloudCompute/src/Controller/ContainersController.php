<?php
namespace MCloudCompute\Controller;

use Cake\Core\Configure;
use Cake\Event\Event;
use MayMeow\Crud\View\Menu\MenuItem;
use MayMeow\SocketClient;
use MCloudCompute\Controller\AppController;

/**
 * Containers Controller
 *
 * @property \MCloudCompute\Model\Table\ContainersTable $Containers
 */
class ContainersController extends AppController
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
        $client = new SocketClient(Configure::read('CakeCompute.dockerSocket'));

        $containers = json_decode($client->setAction('GetContainers')->run());

        $this->set(compact('containers'));
        $this->set('_serialize', ['containers']);
    }

    public function inspect($containerId = null)
    {
        $client = new SocketClient(Configure::read('CakeCompute.dockerSocket'));
        $computeResponse = json_decode($client->setAction('InspectContainer')->setData(['containerID' => $containerId])->run());
        $container = $computeResponse->data;

        if ($container->State->Running) {
            $client2 = new SocketClient(Configure::read('CakeCompute.dockerSocket'));
            $statsResponse = json_decode($client2->setAction('GetContainerStats')->setData(['containerID' => $containerId])->run());
            $stats = $statsResponse->data;
        }

        $this->set(compact('container' , 'stats'));
        $this->set('_serialize', ['container']);
    }

    public function start($containerId = null)
    {
        $client = new SocketClient(Configure::read('CakeCompute.dockerSocket'));
        $computeResponse = json_decode($client->setAction('ContainerStart')->setData(['containerID' => $containerId])->run());

        $this->redirect($this->referer());
    }

    public function stop($containerId = null)
    {
        $client = new SocketClient(Configure::read('CakeCompute.dockerSocket'));
        $computeResponse = json_decode($client->setAction('ContainerStop')->setData(['containerID' => $containerId])->run());

        $this->redirect($this->referer());
    }

    public function restart($containerId = null)
    {
        $client = new SocketClient(Configure::read('CakeCompute.dockerSocket'));
        $computeResponse = json_decode($client->setAction('ContainerRestart')->setData(['containerID' => $containerId])->run());

        $this->redirect($this->referer());
    }

    public function pause($containerId = null)
    {
        $client = new SocketClient(Configure::read('CakeCompute.dockerSocket'));
        $computeResponse = json_decode($client->setAction('ContainerPause')->setData(['containerID' => $containerId])->run());

        $this->redirect($this->referer());
    }

    public function unpause($containerId = null)
    {
        $client = new SocketClient(Configure::read('CakeCompute.dockerSocket'));
        $computeResponse = json_decode($client->setAction('ContainerUnpause')->setData(['containerID' => $containerId])->run());

        $this->redirect($this->referer());
    }
}