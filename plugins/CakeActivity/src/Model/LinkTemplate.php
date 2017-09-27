<?php
/**
 * Created by PhpStorm.
 * User: martin
 * Date: 9/27/2017
 * Time: 7:52 PM
 */

namespace CakeActivity\Model;

use CakeApp\Component\IO\BaseObject;

/**
 * Class LinkTemplate
 * @package CakeActivity\Model
 */
class LinkTemplate extends BaseObject
{
    /**
     * @var
     */
    protected $title;

    /**
     * @var
     */
    protected $prefix;

    /**
     * @var
     */
    protected $plugin;

    /**
     * @var
     */
    protected $controller;

    /**
     * @var
     */
    protected $action;

    /**
     * @var
     */
    protected $id;

    /**
     * @var
     */
    protected $options;

    /**
     * @return mixed
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param mixed $title
     * @return LinkTemplate
     */
    public function setTitle($title)
    {
        $this->title = $title;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getPrefix()
    {
        return $this->prefix;
    }

    /**
     * @param mixed $prefix
     * @return LinkTemplate
     */
    public function setPrefix($prefix)
    {
        $this->prefix = $prefix;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getPlugin()
    {
        return $this->plugin;
    }

    /**
     * @param mixed $plugin
     * @return LinkTemplate
     */
    public function setPlugin($plugin)
    {
        $this->plugin = $plugin;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getController()
    {
        return $this->controller;
    }

    /**
     * @param mixed $controller
     * @return LinkTemplate
     */
    public function setController($controller)
    {
        $this->controller = $controller;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getAction()
    {
        return $this->action;
    }

    /**
     * @param mixed $action
     * @return LinkTemplate
     */
    public function setAction($action)
    {
        $this->action = $action;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     * @return LinkTemplate
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getOptions()
    {
        return $this->options;
    }

    /**
     * @param mixed $options
     * @return LinkTemplate
     */
    public function setOptions($options)
    {
        $this->options = $options;
        return $this;
    }


}