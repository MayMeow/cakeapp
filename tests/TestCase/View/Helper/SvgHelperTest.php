<?php
namespace App\Test\TestCase\View\Helper;

use App\View\Helper\SvgHelper;
use Cake\TestSuite\TestCase;
use Cake\View\View;

/**
 * App\View\Helper\SvgHelper Test Case
 */
class SvgHelperTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\View\Helper\SvgHelper
     */
    public $Svg;

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $view = new View();
        $this->Svg = new SvgHelper($view);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Svg);

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
