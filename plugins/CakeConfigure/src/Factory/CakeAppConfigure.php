<?php
/**
 * Created by PhpStorm.
 * User: martin
 * Date: 9/19/2017
 * Time: 10:16 AM
 */

namespace CakeConfigure\Factory;

use Cake\ORM\TableRegistry;

class CakeAppConfigure
{
    /**
     * @param $key
     * @return mixed
     */
    public static function read($key)
    {
        $settingsTable = TableRegistry::get('application_settings');

        $value = $settingsTable->find()
            ->where(['config_key' => $key])
            ->select(['config_value'])
            ->first();

        return $value->config_value;
    }
}