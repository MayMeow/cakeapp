<?php
namespace MCloudHome\Test\TestCase\Model\Table;

use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;
use MCloudHome\Model\Table\DevicesTable;

/**
 * MCloudHome\Model\Table\DevicesTable Test Case
 */
class DevicesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \MCloudHome\Model\Table\DevicesTable
     */
    public $Devices;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'plugin.m_cloud_home.devices'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Devices') ? [] : ['className' => 'MCloudHome\Model\Table\DevicesTable'];
        $this->Devices = TableRegistry::get('Devices', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Devices);

        parent::tearDown();
    }

    /**
     * Test initialize method
     *
     * @return void
     */
    public function testInitialize()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test validationDefault method
     *
     * @return void
     */
    public function testValidationDefault()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
