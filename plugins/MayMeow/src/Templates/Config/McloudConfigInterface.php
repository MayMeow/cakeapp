<?php
/**
 * Created by PhpStorm.
 * User: martin
 * Date: 3/21/2017
 * Time: 2:00 PM
 */

namespace MayMeow\Templates\Config;


interface McloudConfigInterface
{

    /**
     * Method Serialize
     * Create JSON string
     * @return string
     */
    public function serialize();

    /**
     * Method Write
     * Write configuration file
     */
    public function write();

}