<?php
/**
 * Created by PhpStorm.
 * User: martin
 * Date: 2/26/2017
 * Time: 5:42 PM
 */

namespace MayMeow\Logging;


class ResourceTemplate
{
    public $controller;

    public $action;

    public $plugin;

    public $id;

    /**
     * @param $controller
     * @return $this
     */
    public function controller($controller)
    {
        $this->controller = $controller;

        return $this;
    }

    /**
     * @param $action
     * @return $this
     */
    public function action($action)
    {
        $this->action = $action;

        return $this;
    }

    /**
     * @param $plugin
     * @return $this
     */
    public function plugin($plugin)
    {
        $this->plugin = $plugin;

        return $this;
    }

    /**
     * @param $id
     * @return $this
     */
    public function id($id)
    {
        $this->id = $id;

        return $this;
    }


}