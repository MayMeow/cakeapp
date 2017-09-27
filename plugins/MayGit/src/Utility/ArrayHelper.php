<?php
/**
 * Created by PhpStorm.
 * User: martin
 * Date: 7/14/2017
 * Time: 1:45 PM
 */

namespace MayMeow\Git\Utility;


class ArrayHelper
{
    public static function pregSplitFlatArray($array, $regexp)
    {
        $index = 0;
        $slices = [];
        $slice = [];
        foreach ($array as $val) {
            if (preg_match($regexp, $val) && !empty($slice)) {
                $slices[$index] = $slice;
                ++$index;
                $slice = array();
            }
            $slice[] = $val;
        }
        if (!empty($slice)) {
            $slices[$index] = $slice;
        }
        return $slices;
    }
}