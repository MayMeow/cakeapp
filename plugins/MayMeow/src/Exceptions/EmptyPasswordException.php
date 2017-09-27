<?php
/**
 * Created by PhpStorm.
 * User: martin
 * Date: 4/2/2017
 * Time: 11:00 PM
 */

namespace MayMeow\Exceptions;


use Throwable;

class EmptyPasswordException extends \Exception
{
    public function __construct($message = "", $code = 0, Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }

    public function __toString()
    {
        return __CLASS__ . ": [{$this->code}]: {$this->message}\n";
    }

}