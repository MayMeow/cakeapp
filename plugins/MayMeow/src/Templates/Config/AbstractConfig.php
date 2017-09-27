<?php
/**
 * Created by PhpStorm.
 * User: martin
 * Date: 3/21/2017
 * Time: 1:41 PM
 */

namespace MayMeow\Templates\Config;

class AbstractConfig implements McloudConfigInterface
{

    protected $name;

    /**
     * @param mixed $name
     * @return AbstractConfig
     */
    protected function setName($name)
    {
        $this->name = $name;
        return $this;
    }

    function __construct()
    {
        $this->configure();
    }

    protected function configure()
    {}

    /**
     * Method Serialize
     * Create JSON string
     * @return string
     */
    public function serialize()
    {
        return json_encode(get_object_vars($this));
    }

    /**
     * Method Write
     * Write configuration file
     */
    public function write()
    {
        file_put_contents(CONFIG . "maymeow/". $this->name .".json", $this->serialize());
    }
}