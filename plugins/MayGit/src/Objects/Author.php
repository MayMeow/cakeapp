<?php
/**
 * Created by PhpStorm.
 * User: martin
 * Date: 7/14/2017
 * Time: 2:11 PM
 */

namespace MayMeow\Git\Objects;


class Author
{
    protected $name;

    protected $email;

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     * @return Author
     */
    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param mixed $email
     * @return Author
     */
    public function setEmail($email)
    {
        $this->email = $email;
        return $this;
    }

    public function toString()
    {
        return $this->name . '<' . $this->email . '>';
    }


}