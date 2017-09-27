<?php
/**
 * Created by PhpStorm.
 * User: martin
 * Date: 9/14/2017
 * Time: 3:04 PM
 */

namespace CakeApp\Component\Licensing\Helper;

/**
 * Class TimeHelper
 * @package CakeApp\Component\Licensing\Helper
 */
class TimeHelper
{
    const SECONDS_IN_DAY = 86400;

    /**
     * @param $days
     * @return int
     */
    public static function setInDays($days)
    {
        $now = time();
        $add = static::SECONDS_IN_DAY * (int)$days;

        return $now + $add;
    }

}