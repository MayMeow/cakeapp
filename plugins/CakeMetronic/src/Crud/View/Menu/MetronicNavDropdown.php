<?php

namespace CakeMetronic\Crud\View\Menu;

use MayMeow\Crud\View\Menu\MenuDropdown;

class MetronicNavDropdown extends MenuDropdown
{
    protected $icon;
    
        function __construct($title, $url = null, $options = [], $entries = [])
        {
            parent::__construct($title, $url, $options, $entries);
    
            if (isset($options) && array_key_exists('icon', $options)) {
                $this->icon = $options['icon'];
                unset($options['icon']);
            }
        }
    
        public function getIcon()
        {
            return $this->icon;
        }
}