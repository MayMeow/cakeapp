<?php
namespace CakeStorage\Test\TestCase\View\Helper;

use CakeStorage\View\Helper\JqueryUploadHelper;
use Cake\TestSuite\TestCase;
use Cake\View\View;

/**
 * CakeStorage\View\Helper\JqueryUploadHelper Test Case
 */
class JqueryUploadHelperTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \CakeStorage\View\Helper\JqueryUploadHelper
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
        $view = new View();
        $this->JqueryUpload = new JqueryUploadHelper($view);
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
