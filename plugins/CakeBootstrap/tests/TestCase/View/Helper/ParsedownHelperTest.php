<?php
namespace CakeBootstrap\Test\TestCase\View\Helper;

use CakeBootstrap\View\Helper\ParsedownHelper;
use Cake\TestSuite\TestCase;
use Cake\View\View;

/**
 * CakeBootstrap\View\Helper\ParsedownHelper Test Case
 */
class ParsedownHelperTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \CakeBootstrap\View\Helper\ParsedownHelper
     */
    public $Parsedown;

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $view = new View();
        $this->Parsedown = new ParsedownHelper($view);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Parsedown);

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
