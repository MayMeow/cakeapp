<?php
/**
 * Created by PhpStorm.
 * User: martin
 * Date: 9/19/2017
 * Time: 10:58 AM
 */

namespace CakeApp\Component\Licensing\Factory;

use CakeConfigure\Factory\CakeAppConfigure;
use CakeApp\Component\Licensing\Controller\LicenseController;

/**
 * Class LicenseFactory
 * @package CakeApp\Component\Licensing\Factory
 */
class LicenseFactory
{
    /**
     * @param null $licenseTypes
     * @return bool
     */
    public static function isLicensed($licenseTypes = null)
    {
        $lc = new LicenseController();
        $lc->setLicenseData(CakeAppConfigure::read('cakeapp.license'));
        $lc->getSecurityFactory()->setPublicKey('CakeApp');

        return $lc->isLicensed($licenseTypes);
    }

    /**
     * @return bool|\SK\CakeApp\Licensing\Model\License
     */
    public static function read()
    {
        $lc = new LicenseController();
        $lc->setLicenseData(CakeAppConfigure::read('cakeapp.license'));
        $lc->getSecurityFactory()->setPublicKey('CakeApp');

        return $lc->getLicense();
    }
}