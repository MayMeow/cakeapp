<?php

namespace MayMeow\Git\Objects\Commit;
/**
 * Created by PhpStorm.
 * User: martin
 * Date: 7/14/2017
 * Time: 4:15 PM
 */
class Message
{
    protected $message;

    function __construct($message)
    {
        if (is_array($message)) {
            $this->message = $message;
        } else {
            $this->message = [];
            $this->message = (string) $message;
        }
    }

    public function toString($full = false)
    {
        if (count($this->message) == 0) {
            return null;
        }

        if ($full) {
            return implode(PHP_EOL, $this->message);
        } else {
            return $this->message[0];
        }
    }

    public function getShortMessage()
    {
        return $this->toString();
    }

    public function getFullMessage()
    {
        return $this->toString(true);
    }

    public function __toString()
    {
        return $this->toString();
    }

}