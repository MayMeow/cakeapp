<?php
/**
 * Created by PhpStorm.
 * User: martin
 * Date: 3/19/2017
 * Time: 5:53 PM
 */

namespace MayMeow\Generator;

class RandomStringGenerator
{
    /**
     * Codebase for generating strings
     *
     * @var array
     */
    protected static $codebase = [
        'default' => 'abcdefghijklmnopqrstuvwxyz1234567890',
        'key' => 'a123b45c67d89e0f',
        'secret' => 'g098h76i54j32k1l'
    ];

    /**
     * @param int $lenght
     * @return string
     */
    public static function generate($lenght = 5, $type = 'default')
    {
        $string = '';

        $codebase = self::$codebase[$type];
        $count = strlen($codebase);

        for ($i = 1; $i <= $lenght; ++$i)
        {
            $string .= $codebase[rand(1, $count-1)];
        }

        return $string;
    }
}