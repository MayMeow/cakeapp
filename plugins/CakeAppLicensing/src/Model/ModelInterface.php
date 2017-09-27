<?php
/**
 * Created by PhpStorm.
 * User: martin
 * Date: 9/14/2017
 * Time: 4:44 PM
 */

namespace CakeApp\Component\Licensing\Model;

/**
 * Interface ModelInterface
 * @package CakeApp\Component\Licensing\Model
 */
interface ModelInterface
{
    /**
     * @param \stdClass $licenseData
     * @return mixed
     */
    public function createFromArray(\stdClass $licenseData);
}