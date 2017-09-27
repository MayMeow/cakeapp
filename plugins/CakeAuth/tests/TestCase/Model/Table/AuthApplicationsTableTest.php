<?php
namespace CakeAuth\Test\TestCase\Model\Table;

use CakeAuth\Model\Table\AuthApplicationsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * CakeAuth\Model\Table\AuthApplicationsTable Test Case
 */
class AuthApplicationsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \CakeAuth\Model\Table\AuthApplicationsTable
     */
    public $AuthApplications;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'plugin.cake_auth.auth_applications',
        'plugin.cake_auth.users',
        'plugin.cake_auth.profiles',
        'plugin.cake_auth.access_tokens'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('AuthApplications') ? [] : ['className' => 'CakeAuth\Model\Table\AuthApplicationsTable'];
        $this->AuthApplications = TableRegistry::get('AuthApplications', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->AuthApplications);

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
