<?php
/**
 * Created by PhpStorm.
 * User: martin
 * Date: 3/26/2017
 * Time: 8:01 PM
 */

namespace MayMeow\Crud\View\Menu;

/**
 * Class MenuDropdown
 * Menu dropdown extending menu item but it can have submenu items
 * @package MayMeow\Crud\View\Menu
 */
class MenuDropdown extends MenuItem
{
    protected $title;

    protected $entries = [];

    protected $plugins = [];

   function __construct($title, $url = null, array $options = [], array $entries = [])
   {
       parent::__construct($title, $url, $options);

       $this->entries = $entries;

       /**
        * Create array of plugins
        */
       foreach ($this->entries as $entry) {
           if ($entry instanceof MenuItem) {
               $this->plugins[] = $entry->getUrl()['plugin'];
           }
       }
   }

    /**
     * @param $plugin
     * @return bool
     */
    public function hasActivePlugin($plugin)
    {
        return in_array($plugin, $this->plugins);
    }

    /**
     * @return mixed
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @return array
     */
    public function getEntries()
    {
        return $this->entries;
    }

    /**
     * @return array
     */
    public function getPlugins()
    {
        return $this->plugins;
    }
}
