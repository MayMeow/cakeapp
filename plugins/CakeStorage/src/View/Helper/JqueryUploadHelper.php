<?php
namespace CakeStorage\View\Helper;

use Cake\View\Helper;
use Cake\View\View;

/**
 * JqueryUpload helper
 */
class JqueryUploadHelper extends Helper
{

    /**
     * Default configuration.
     *
     * @var array
     */
    protected $_defaultConfig = [];

    public $helpers = [
        'Html'
    ];

    public function loadCss()
    {
        $css = [
            'CakeStorage.jquery.fileupload.css',
            'CakeStorage.jquery.fileupload-ui.css',
        ];
        return $this->Html->css($css);
    }

    public function loadScripts($ui = true)
    {
        $scripts = [
            'CakeStorage.jquery.iframe-transport.js',
            'CakeStorage.jquery.fileupload.js',
        ];

        if ($ui) {
            array_unshift($scripts, 'CakeStorage.vendor/jquery.ui.widget.js');
        }
        return $this->Html->script($scripts);
    }

}
