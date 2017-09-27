<?php
/**
 * Created by PhpStorm.
 * User: martin
 * Date: 9/14/2017
 * Time: 11:22 AM
 */

namespace CakeApp\Component\Licensing\Model;

/**
 * Class BaseModel
 * @package CakeApp\Component\Licensing\Model
 */
class BaseModel implements ModelInterface
{
    /**
     * @return string
     */
    protected function serialize()
    {
        return json_encode(get_object_vars($this));
    }

    /**
     * @param \stdClass $licenseData
     * @return $this
     */
    public function createFromArray(\stdClass $licenseData)
    {
        foreach ($licenseData as $key => $value)
        {
            if(property_exists($this, $key)) {
                $this->$key = $value;
            }
        }

        return $this;
    }

}