<?php
/**
 * Created by PhpStorm.
 * User: martin
 * Date: 7/19/2017
 * Time: 10:26 PM
 */

namespace CakeApp\Component\Shell\Ssh;

use Cake\Filesystem\Folder;

class AuthorizedKeys
{
    const KEY_STORAGE = DATA_STORE . '.ssh' . DS;

    public static function writeKeys($keys)
    {
        $keyFile = self::KEY_STORAGE . 'authorized_keys';

        $keysString = '';

        foreach ($keys as $key => $value) {
            $keysString .= $value . "\n";
        }

        self::_folderExists(self::KEY_STORAGE);

        file_put_contents($keyFile, $keysString);

        $folder = new Folder();
        //change permission for all files
        $folder->chmod(self::KEY_STORAGE, 0755, true);

        //shell_exec('ln -sf ' . $keyFile . ' ' . GIT_DATA . '.ssh' . DS . 'authorized_keys');
    }

    /**
     * _folderExists method Check if exists folder for upload and if false create one.
     * @param null $folderPath
     */
    protected static function _folderExists($folderPath = null) {
        $folder = new Folder('/');
        if (!$folder->cd($folderPath)) {
            $folder->create($folderPath);
        }
    }
}
