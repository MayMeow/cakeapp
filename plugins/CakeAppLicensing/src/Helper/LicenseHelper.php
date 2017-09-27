<?php
/**
 * Created by PhpStorm.
 * User: martin
 * Date: 9/14/2017
 * Time: 11:30 AM
 */

namespace CakeApp\Component\Licensing\Helper;

/**
 * Class LicenseHelper
 * @package CakeApp\Component\Licensing\Helper
 */
class LicenseHelper
{
    /**
     * Namespace used to generate license IDs
     */
    const NAMESPACE = "281034a8-cd2d-4158-82e5-d0357b05e13a";

    /**
     * sk.cakeapp.license.ees
     */
    const EES = 'de2ce654-b2ca-5a84-a290-9053c85d60b0';

    /**
     * sk.cakeapp.license.ce
     */
    const CE = '9a9c1036-c8f2-554d-843a-6a9e4a70aef9';

    /**
     * sk.cakeapp.license.eep
     */
    const EEP = 'ddd00f28-07f8-551b-9675-e6478aaa2437';

    /**
     * sk.cakeapp.license.edu
     */
    const EDU = '5c97c61e-d38f-5b6e-9d53-79bbbc5dd4bf';

    public static function licenseType($identifier = null)
    {
        $licenses = [
            static::EES => 'EES',
            static::EEP => 'EEP',
            static::EDU => 'EDU',
            static::CE => 'CE'
        ];

        return $licenses[$identifier];
    }
}