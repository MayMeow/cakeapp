<?php
namespace CakeApp\Test\TestCase\Controller\Component;

use CakeApp\Controller\Component\SystemUtilityComponent;
use Cake\Controller\ComponentRegistry;
use Cake\TestSuite\TestCase;

/**
 * CakeApp\Controller\Component\SystemUtilityComponent Test Case
 */
class SystemUtilityComponentTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \CakeApp\Controller\Component\SystemUtilityComponent
     */
    public $SystemUtility;

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $registry = new ComponentRegistry();
        $this->SystemUtility = new SystemUtilityComponent($registry);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->SystemUtility);

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
