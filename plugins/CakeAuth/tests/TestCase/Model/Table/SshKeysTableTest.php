<?php
namespace CakeAuth\Test\TestCase\Model\Table;

use CakeAuth\Model\Table\SshKeysTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * CakeAuth\Model\Table\SshKeysTable Test Case
 */
class SshKeysTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \CakeAuth\Model\Table\SshKeysTable
     */
    public $SshKeys;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'plugin.cake_auth.ssh_keys',
        'plugin.cake_auth.users',
        'plugin.cake_auth.profiles'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('SshKeys') ? [] : ['className' => SshKeysTable::class];
        $this->SshKeys = TableRegistry::get('SshKeys', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->SshKeys);

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
