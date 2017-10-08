<?php
namespace MCloudResources\Test\TestCase\Model\Table;

use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;
use MCloudResources\Model\Table\ResourceGroupsUsersTable;

/**
 * MCloudResources\Model\Table\ResourceGroupsUsersTable Test Case
 */
class ResourceGroupsUsersTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \MCloudResources\Model\Table\ResourceGroupsUsersTable
     */
    public $ResourceGroupsUsers;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'plugin.m_cloud_resources.resource_groups_users',
        'plugin.m_cloud_resources.resource_groups',
        'plugin.m_cloud_resources.users',
        'plugin.m_cloud_resources.people',
        'plugin.m_cloud_resources.profiles'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('ResourceGroupsUsers') ? [] : ['className' => ResourceGroupsUsersTable::class];
        $this->ResourceGroupsUsers = TableRegistry::get('ResourceGroupsUsers', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->ResourceGroupsUsers);

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
