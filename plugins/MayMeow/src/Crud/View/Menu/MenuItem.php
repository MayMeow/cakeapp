<?php
/**
 * Created by PhpStorm.
 * User: martin
 * Date: 3/24/2017
 * Time: 11:57 AM
 */

namespace MayMeow\Crud\View\Menu;

class MenuItem
{
    protected $title;

    protected $url = null;

    protected $options = [];

    protected $activeIf = [];

    function __construct($title, $url = null, $options = [])
    {
        $this->title = $title;
        $this->url = $url;
        $this->options = $options;
    }

    /**
     * @return mixed
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @return null
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * @return array
     */
    public function getOptions()
    {
        return $this->options;
    }
}
