<?php
/**
 * Created by PhpStorm.
 * User: martin
 * Date: 3/26/2017
 * Time: 8:01 PM
 */

namespace MayMeow\Crud\View\Menu;


class MenuDropdown
{
    protected $title;

    protected $entries = [];

    function __construct($title, $entries = [])
    {
        $this->title = $title;
        $this->entries = $entries;
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
}
