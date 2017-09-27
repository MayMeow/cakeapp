<?php
/**
 * Created by PhpStorm.
 * User: martin
 * Date: 9/14/2017
 * Time: 11:09 AM
 */

namespace CakeApp\Component\Licensing\Controller;

use MayMeow\Factory\CertificateFactory;
use MayMeow\Factory\SecurityFactory;
use CakeApp\Component\Licensing\Model\License;

/**
 * Class LicenseController
 * @package CakeApp\Component\Licensing\Controller
 */
class LicenseController
{
    /**
     * @var
     */
    protected $licenseTemplate;

    /**
     * @var null
     */
    protected $path;

    /**
     * @var
     */
    protected $licenseData;

    /**
     * @var
     */
    protected $securityFactory;

    public function __construct($path = null)
    {
        if ($path != null) {
            $this->path = $path;
        }
    }

    /**
     * @return string
     */
    public function getPath(): string
    {
        return $this->path;
    }

    /**
     * @param string $path
     * @return LicenseController
     */
    public function setPath(string $path): LicenseController
    {
        $this->path = $path;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getLicenseData()
    {
        return $this->licenseData;
    }

    /**
     * @param mixed $licenseData
     * @return LicenseController
     */
    public function setLicenseData($licenseData)
    {
        $this->licenseData = $licenseData;
        return $this;
    }

    /**
     * @return License
     */
    public function setNewLicense()
    {
        if (null == $this->licenseTemplate) {
            $this->licenseTemplate = new License();
        }

        return $this->licenseTemplate;
    }

    /**
     * @return SecurityFactory
     */
    public function getSecurityFactory()
    {
        if (null == $this->securityFactory) {
            $cf = new CertificateFactory();
            $cf->setDataPath(CERTIFICATES);

            $this->securityFactory = new SecurityFactory($cf);
        }

        return $this->securityFactory;
    }

    /**
     *
     */
    public function sign()
    {
        $licenseFile = $this->securityFactory->setString($this->licenseTemplate->getSerialized())
            ->encrypt();

        file_put_contents($this->path, base64_encode($licenseFile));
    }

    /**
     * @return License|bool
     */
    public function getLicense()
    {
        // If license data is not null try to get certificate from string otherwise load from file
        if ($this->licenseData != '') {

            $licenseFile = base64_decode($this->licenseData);
            $decoded = json_decode($this->securityFactory->setString($licenseFile)->decrypt());

            $license = new License();

            return $license->createFromArray($decoded);

        } else {
            // return false if not exists license file
            if (file_exists($this->path) == false) return false;

            $licenseFile = base64_decode($this->getFromFile());
            $decoded = json_decode($this->securityFactory->setString($licenseFile)->decrypt());

            $license = new License();

            return $license->createFromArray($decoded);
        }
    }

    /**
     * @return bool|string
     */
    protected function getFromFile()
    {
        return file_get_contents($this->path);
    }

    /**
     * @param null $licenseTypes
     * @return bool
     */
    public function isLicensed($licenseTypes = null)
    {
        $license = $this->getLicense();

        if ($license == false) return false;

        // If license types are not null check validation date and required type, otherwise check only date
        if ($licenseTypes != null) {
            // return false if license is expired
            if (!$license->isValid()) return false;

            // If license dont have required type return false
            if (!in_array($license->getType(), $licenseTypes)) return false;
        } else {
            // return false if license is expired
            if (!$license->isValid()) return false;
        }

        return true;
    }

}