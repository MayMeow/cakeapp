<?php
namespace CakeStorage\Controller\Component;

use Cake\Controller\Component;
use Cake\Controller\ComponentRegistry;

/**
 * JqueryUpload component
 */
class JqueryUploadComponent extends Component
{

    /**
     * Default configuration.
     *
     * @var array
     */
    protected $_defaultConfig = [];

    public function upload($options = null)
    {
        if (!isset($options['print_response'])) {
            $options['print_response'] = false;
        }

        $upload = new \UploadHandler($options);

        return $upload->get_response();
    }
}
