<?php
namespace CakeBootstrap\Test\TestCase\View\Helper;

use Bootstrap\View\Helper\HtmlHelper;
use Cake\TestSuite\TestCase;
use Cake\View\View;

/**
 * Bootstrap\View\Helper\HtmlHelper Test Case
 */
class HtmlHelperTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \Bootstrap\View\Helper\HtmlHelper
     */
    public $Html;

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $view = new View();
        $this->Html = new HtmlHelper($view);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Html);

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
