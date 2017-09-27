<?php
namespace CakeBootstrap\Test\TestCase\View\Helper;

use Bootstrap\View\Helper\FlashHelper;
use Cake\TestSuite\TestCase;
use Cake\View\View;

/**
 * Bootstrap\View\Helper\FlashHelper Test Case
 */
class FlashHelperTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \Bootstrap\View\Helper\FlashHelper
     */
    public $Flash;

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $view = new View();
        $this->Flash = new FlashHelper($view);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Flash);

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
