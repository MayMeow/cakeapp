<?php
/**
 * Created by PhpStorm.
 * User: martin
 * Date: 9/27/2017
 * Time: 1:29 PM
 */

namespace CakeApp\Component\IO\Serializer;

use CakeApp\Component\IO\BaseObject;

/**
 * Class ObjectSerializer
 * @package CakeApp\Component\IO\Serializer
 */
class ObjectSerializer
{
    /**
     * @param BaseObject $baseObject
     * @return string
     */
    public function serialize(BaseObject $baseObject)
    {
        return json_encode($baseObject->toArray());
    }
}