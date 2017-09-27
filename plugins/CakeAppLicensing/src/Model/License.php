<?php
/**
 * Created by PhpStorm.
 * User: martin
 * Date: 9/14/2017
 * Time: 11:09 AM
 */

namespace CakeApp\Component\Licensing\Model;

/**
 * Class License
 * @package CakeApp\Component\Licensing\Model
 */
class License extends BaseModel
{
    protected $user;

    protected $type;

    protected $expires;

    protected $quantity;

    /**
     * @return mixed
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * @param mixed $user
     * @return License
     */
    public function setUser($user)
    {
        $this->user = $user;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param mixed $type
     * @return License
     */
    public function setType($type)
    {
        $this->type = $type;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getExpires()
    {
        return $this->expires;
    }

    /**
     * @param mixed $expires
     * @return License
     */
    public function setExpires($expires)
    {
        $this->expires = $expires;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getQuantity()
    {
        return $this->quantity;
    }

    /**
     * @param mixed $quantity
     * @return License
     */
    public function setQuantity($quantity) : License
    {
        $this->quantity = $quantity;
        return $this;
    }

    public function getSerialized() : string
    {
        return $this->serialize();
    }

    public function isValid() : bool
    {
        if ($this->expires > time()) {
            return true;
        }

        return false;
    }
}