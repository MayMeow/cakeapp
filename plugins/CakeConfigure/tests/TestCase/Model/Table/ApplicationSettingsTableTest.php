<?php
namespace CakeConfigure\Test\TestCase\Model\Table;

use CakeConfigure\Model\Table\ApplicationSettingsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * CakeConfigure\Model\Table\ApplicationSettingsTable Test Case
 */
class ApplicationSettingsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \CakeConfigure\Model\Table\ApplicationSettingsTable
     */
    public $ApplicationSettings;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'plugin.cake_configure.application_settings'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('ApplicationSettings') ? [] : ['className' => ApplicationSettingsTable::class];
        $this->ApplicationSettings = TableRegistry::get('ApplicationSettings', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->ApplicationSettings);

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
