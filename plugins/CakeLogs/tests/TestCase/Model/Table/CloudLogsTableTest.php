<?php
namespace CakeLogs\Test\TestCase\Model\Table;

use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;
use CakeLogs\Model\Table\CloudLogsTable;

/**
 * MCloudLogging\Model\Table\CloudLogsTable Test Case
 */
class CloudLogsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \MCloudLogging\Model\Table\CloudLogsTable
     */
    public $CloudLogs;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'plugin.m_cloud_logging.cloud_logs'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('CloudLogs') ? [] : ['className' => 'MCloudLogging\Model\Table\CloudLogsTable'];
        $this->CloudLogs = TableRegistry::get('CloudLogs', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->CloudLogs);

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
