<?php
/**
 * Created by PhpStorm.
 * User: martin
 * Date: 3/19/2017
 * Time: 6:16 PM
 */

namespace MayMeow\Templates\Config;

class AgentConfig
{
    protected $version;

    protected $server;

    protected $app_key;

    protected $app_secret;

    /**
     * @param mixed $version
     * @return AgentConfig
     */
    public function setVersion($version)
    {
        $this->version = $version;
        return $this;
    }

    /**
     * @param mixed $server
     * @return AgentConfig
     */
    public function setServer($server)
    {
        $this->server = $server;
        return $this;
    }

    /**
     * @param mixed $app_key
     * @return AgentConfig
     */
    public function setAppKey($app_key)
    {
        $this->app_key = $app_key;
        return $this;
    }

    /**
     * @param mixed $app_secret
     * @return AgentConfig
     */
    public function setAppSecret($app_secret)
    {
        $this->app_secret = $app_secret;
        return $this;
    }

    public function serialize()
    {
        return json_encode(get_object_vars($this));
    }

    public function write()
    {
        file_put_contents(CONFIG . "agent.json", $this->serialize());
    }
}