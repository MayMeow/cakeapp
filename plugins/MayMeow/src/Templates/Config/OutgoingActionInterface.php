<?php
/**
 * Created by PhpStorm.
 * User: martin
 * Date: 3/24/2017
 * Time: 10:21 AM
 */

namespace MayMeow\Templates\Config;


interface OutgoingActionInterface
{
    /**
     * @param mixed $data
     * @return OutgoingActionConfig
     */
    public function setData($data);

    /**
     * @param mixed $action
     * @return OutgoingActionConfig
     */
    public function setAction($action);

    public function serialize();
}