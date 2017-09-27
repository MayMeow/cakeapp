<?php
namespace CakeLogs\Controller\Component;

use Cake\Controller\Component;
use Cake\Controller\ComponentRegistry;
use MayMeow\Logging\CloudLogTemplate;

/**
 * CloudLog component
 */
class CloudLogComponent extends Component
{

    /**
     * Default configuration.
     *
     * @var array
     */
    protected $_defaultConfig = [
        'package' => 'plugin',
        'domain' => 'controller',
        'action' => 'action'
    ];

    /**
     * @var $template
     *
     * Cloud Log template
     */
    protected $template;

    /**
     * @var $ctrl
     *
     * Controller
     */
    protected $ctrl;

    /**
     * @return mixed
     */
    protected function _getCtrl()
    {
        if(!$this->ctrl) {
            $this->ctrl = $this->_registry->getController();
            return $this->ctrl;
        }

        return $this->ctrl;
    }

    /**
     * @return CloudLogTemplate
     *
     * Return template and set resource information from configuration
     */
    public function template()
    {
        $config = $this->config();
        if(!$this->template) {
            $this->template = new CloudLogTemplate();
            $this->template()->setResource()->plugin($config['package'])->controller($config['domain']);
        }
        return $this->template;
    }

    /**
     * @param null $severity
     * @param null $jsonPayload
     *
     * Create log in database
     */
    public function create($severity = null, $jsonPayload = null)
    {
        $data = $this->template();

        $severity ? $data->severity = $severity : null;
        $jsonPayload ? $data->jsonPayload = $jsonPayload : null;

        $ctrl = $this->_getCtrl();

        $clTable = $ctrl->loadModel('MCloudLogging.CloudLogs');

        $cl = $clTable->newEntity();

        $cl->severity = $data->severity;
        $cl->resource_key = $data->getResource()->plugin . '.' . $data->getResource()->controller . '.' . $data->getResource()->action . '.' . $data->getResource()->id;
        $cl->event_type = $data->getEventType();
        $cl->json_data = $data->serialize();

        $clTable->save($cl);

    }
}
