<?php

namespace CakeMetronic\Crud\View\Menu;

use MayMeow\Crud\View\Menu\MenuItem;

class MetronicNavItem extends MenuItem
{
    protected $icon;

    function __construct($title, $url = null, $options = [])
    {
        parent::__construct($title, $url, $options);

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