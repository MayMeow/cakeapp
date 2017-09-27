<?php
namespace CakeApp\View\Cell;

use Cake\Core\Configure;
use Cake\View\Cell;
use CakeApp\Component\Licensing\Factory\LicenseFactory;
use CakeApp\Component\Licensing\Helper\LicenseHelper;

/**
 * SystemUtility cell
 */
class SystemUtilityCell extends Cell
{

    /**
     * List of valid options that can be passed into this
     * cell's constructor.
     *
     * @var array
     */
    protected $_validCellOptions = [];

    /**
     * Default display method.
     *
     * @return void
     */
    public function display()
    {
    }

    public function gitDataDisk()
    {
        $path = Configure::read('CakeApp.Git.paths.git-data');

        $spaces = [
            'path' => $path[0],
            'free' => disk_free_space($path[0]),
            'total' => disk_total_space($path[0])
        ];

        $this->set('disk', $spaces);
    }

    public function license()
    {
        $lic = LicenseFactory::read();

        $type = LicenseHelper::licenseType($lic->getType());

        $this->set('licenseType', $type);
        $this->set('licenseData', $lic);
    }
}
