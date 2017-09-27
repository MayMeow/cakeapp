<?php
/**
 * Created by PhpStorm.
 * User: martin
 * Date: 7/13/2017
 * Time: 2:35 PM
 */

namespace MayMeow\Git\Command;


class BaseCommand
{
    protected $arguments = [];

    protected $name;

    protected $subject;

    public function addArgument($argument)
    {
        $this->arguments[] = $argument;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     * @return BaseCommand
     */
    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }


    /**
     * @return array
     */
    public function getArguments()
    {
        return $this->arguments;
    }

    protected function _getCli()
    {
        $args = '';
        foreach ($this->arguments as $argument) {
            $args .= ' ' . $argument;
        }

        if ($this->subject) {
            return $this->name . $args . ' ' . $this->subject;
        }

        return $this->name . $args;
    }

    /**
     * @param mixed $subject
     * @return BaseCommand
     */
    public function setSubject($subject)
    {
        $this->subject = $subject;
        return $this;
    }

}