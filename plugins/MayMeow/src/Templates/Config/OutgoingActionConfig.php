<?php
/**
 * Created by PhpStorm.
 * User: martin
 * Date: 3/19/2017
 * Time: 7:34 PM
 */

namespace MayMeow\Templates\Config;

class OutgoingActionConfig implements OutgoingActionInterface
{
    protected $data;

    protected $action;

    /**
     * @param mixed $data
     * @return OutgoingActionConfig
     */
    public function setData($data)
    {
        $this->data = $data;
        return $this;
    }

    /**
     * @param mixed $action
     * @return OutgoingActionConfig
     */
    public function setAction($action)
    {
        $this->action = $action;
        return $this;
    }

    public function serialize()
    {
        return json_encode(get_object_vars($this));
    }
}