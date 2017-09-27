<?php
/**
 * Created by PhpStorm.
 * User: martin
 * Date: 9/20/2017
 * Time: 9:20 PM
 */

namespace CakeApp\Component\IO;

/**
 * Class BaseObject
 * @package CakeApp\Component\IO
 */
class BaseObject implements BaseObjectInterface
{
    /**
     * @return array
     */
    protected function _getVariables()
    {
        return get_object_vars($this);
    }

    /**
     * @return string
     */
    public function serialize()
    {
        return json_encode($this->_getVariables());
    }

    public function toArray()
    {
        $tmpArray = get_object_vars($this);

        $newArray = [];

        foreach ($tmpArray as $key => $value) {
            if ($this->$key instanceof BaseObject) {
                $newArray[$key] = $this->$key->toArray();
            } else {
                $newArray[$key] = $value;
            }
        }

        return $newArray;
    }
}