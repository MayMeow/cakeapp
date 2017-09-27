<?php
namespace CakeBootstrap\Test\TestCase\View\Helper;

use CakeBootstrap\View\Helper\EmojiHelper;
use Cake\TestSuite\TestCase;
use Cake\View\View;

/**
 * CakeBootstrap\View\Helper\EmojiHelper Test Case
 */
class EmojiHelperTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \CakeBootstrap\View\Helper\EmojiHelper
     */
    public $Emoji;

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $view = new View();
        $this->Emoji = new EmojiHelper($view);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Emoji);

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
