<?php
/**
 * Created by PhpStorm.
 * User: martin
 * Date: 4/2/2017
 * Time: 10:53 PM
 */

namespace MayMeow\Security;

use MayMeow\Exceptions\EmptyPasswordException;

class PasswordHasher
{
    /**
     * @var string
     */
    private static $TAG = self::class;

    /**
     * @param null $password
     * @param array $options
     * @return bool|string
     * @throws EmptyPasswordException
     */
    public static function hash($password = null, array $options = [])
    {
        if ($password == null)
        {
            throw new EmptyPasswordException( self::$TAG . ' Password can not be NULL', 20);
        }

        return password_hash($password, PASSWORD_BCRYPT, $options);
    }
}