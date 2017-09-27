<?php

namespace MayMeow\Api;

class ServerResponse
{
    protected $version = "1";

    protected $code;

    protected $message;

    protected $data;

    public function getCode()
    {
        return $this->code;
    }

    public function setCode($code = null)
    {
        $this->code = $code;
        
        return $this;
    }

    public function getMessage()
    {
        return $this->message;
    }

    public function setMessage($message = null)
    {
        $this->message = $message;

        return $this;
    }

    public function getData()
    {
        return $this->data;
    }

    public function setData($data = null)
    {
        $this->data = $data;

        return $this;
    }

    protected function _getVariables()
    {
        return get_object_vars($this);
    }

    public function get()
    {
        return $this->_getVariables();
    }
}