<?php
namespace CakeStorage\Test\TestCase\Model\Table;

use CakeStorage\Model\Table\DisksTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * CakeStorage\Model\Table\DisksTable Test Case
 */
class DisksTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \CakeStorage\Model\Table\DisksTable
     */
    public $Disks;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'plugin.cake_storage.disks',
        'plugin.cake_storage.users'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Disks') ? [] : ['className' => 'CakeStorage\Model\Table\DisksTable'];
        $this->Disks = TableRegistry::get('Disks', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Disks);

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

    /**
     * Test buildRules method
     *
     * @return void
     */
    public function testBuildRules()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
