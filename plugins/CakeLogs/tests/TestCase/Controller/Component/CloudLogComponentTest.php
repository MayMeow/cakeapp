<?php
namespace CakeLogs\Test\TestCase\Controller\Component;

use Cake\Controller\ComponentRegistry;
use Cake\TestSuite\TestCase;
use CakeLogs\Controller\Component\CloudLogComponent;

/**
 * MCloudLogging\Controller\Component\CloudLogComponent Test Case
 */
class CloudLogComponentTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \MCloudLogging\Controller\Component\CloudLogComponent
     */
    public $CloudLog;

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $registry = new ComponentRegistry();
        $this->CloudLog = new CloudLogComponent($registry);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->CloudLog);

        parent::tearDown();
    }

    /**
     * Test initial setup
     *
     * @return void
     */
    public function testInitialization()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
