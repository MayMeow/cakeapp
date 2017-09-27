<?php
/**
 * Created by PhpStorm.
 * User: martin
 * Date: 9/27/2017
 * Time: 12:55 PM
 */

namespace CakeActivity\Model;


use CakeApp\Component\IO\BaseObject;

class UserTemplate extends BaseObject
{
    protected $id;

    protected $username;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     * @return UserTemplate
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * @param mixed $username
     * @return UserTemplate
     */
    public function setUsername($username)
    {
        $this->username = $username;
        return $this;
    }
}