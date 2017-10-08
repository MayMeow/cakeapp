<?php
use Migrations\AbstractSeed;

/**
 * ResourceClasses seed.
 */
class ResourceClassesSeed extends AbstractSeed
{
    /**
     * Run Method.
     *
     * Write your database seeder using this method.
     *
     * More information on writing seeds is available here:
     * http://docs.phinx.org/en/latest/seeding.html
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                //'id' => '2',
                'name' => 'Domains',
                'description' => 'Register domains for atuhentication',
                'ctrl' => 'Domains',
                'package' => 'CakeNetworking',
                'uid' => '2fb55f8a-1891-46bf-8565-fda89f1be946',
                'uname' => 'CakeNetworking.Domains',
                'icon' => 'globe',
                'developer' => 'Martin Kukolos',
                'created' => '2017-02-09 14:12:49',
                'modified' => '2017-02-09 14:12:49',
            ],
            [
                //'id' => '3',
                'name' => 'MCloud CDN',
                'description' => 'Content delivery network',
                'ctrl' => 'ContentDeliveryNetworks',
                'package' => 'CakeNetworking',
                'uid' => '47ea2579-6307-45b0-b04f-3e89a2f90c6f',
                'uname' => 'CakeNetworking.ContentDeliveryNetworks',
                'icon' => 'cloud',
                'developer' => 'Martin Kukolos',
                'created' => '2017-02-09 14:19:30',
                'modified' => '2017-02-09 14:19:57',
            ],
            [
                //'id' => '4',
                'name' => 'Storage',
                'description' => 'storage',
                'ctrl' => 'Buckets',
                'package' => 'CakeStorage',
                'uid' => '4df84668-2adf-4754-bede-d7444323f835',
                'uname' => 'CakeStorage.Buckets',
                'icon' => 'bitbucket',
                'developer' => 'Martin Kukolos',
                'created' => '2017-02-09 14:21:03',
                'modified' => '2017-02-09 14:21:03',
            ],
            [
                //'id' => '4',
                'name' => 'Disks',
                'description' => 'Presistent SCSI disks',
                'ctrl' => 'Disks',
                'package' => 'CakeStorage',
                'uid' => '05b80b6a-0bcb-4131-84ee-75c5bac82bc5',
                'uname' => 'CakeStorage.Disks',
                'icon' => 'clone',
                'developer' => 'Martin Kukolos',
                'created' => '2017-02-09 14:21:03',
                'modified' => '2017-02-09 14:21:03',
            ],
        ];

        $table = $this->table('resource_classes');
        $table->insert($data)->save();
    }
}
