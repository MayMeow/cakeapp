<?php
namespace CakeAuth\Test\TestCase\Model\Table;

use CakeAuth\Model\Table\AccessTokensTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * CakeAuth\Model\Table\AccessTokensTable Test Case
 */
class AccessTokensTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \CakeAuth\Model\Table\AccessTokensTable
     */
    public $AccessTokens;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'plugin.cake_auth.access_tokens',
        'plugin.cake_auth.users',
        'plugin.cake_auth.profiles',
        'plugin.cake_auth.auth_applications',
        'plugin.cake_auth.clients'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('AccessTokens') ? [] : ['className' => 'CakeAuth\Model\Table\AccessTokensTable'];
        $this->AccessTokens = TableRegistry::get('AccessTokens', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->AccessTokens);

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
