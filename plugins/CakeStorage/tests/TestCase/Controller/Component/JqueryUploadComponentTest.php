<?php
namespace CakeStorage\Test\TestCase\Controller\Component;

use CakeStorage\Controller\Component\JqueryUploadComponent;
use Cake\Controller\ComponentRegistry;
use Cake\TestSuite\TestCase;

/**
 * CakeStorage\Controller\Component\JqueryUploadComponent Test Case
 */
class JqueryUploadComponentTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \CakeStorage\Controller\Component\JqueryUploadComponent
     */
    public $JqueryUpload;

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $registry = new ComponentRegistry();
        $this->JqueryUpload = new JqueryUploadComponent($registry);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->JqueryUpload);

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
