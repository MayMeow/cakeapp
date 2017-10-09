<?php
namespace CakeResource\Test\TestCase\Model\Table;

use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;
use CakeResource\Model\Table\ProjectsUsersTable;

/**
 * CakeResource\Model\Table\ProjectsUsersTable Test Case
 */
class ProjectsUsersTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \CakeResource\Model\Table\ProjectsUsersTable
     */
    public $ResourceGroupsUsers;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'plugin.cake_resource.projects_users',
        'plugin.cake_resource.projects',
        'plugin.cake_auth.users',
        //'plugin.cake_resource.people',
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
        $config = TableRegistry::exists('ProjectsUsersTable') ? [] : ['className' => ProjectsUsersTable::class];
        $this->ResourceGroupsUsers = TableRegistry::get('ProjectsUsersTable', $config);
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
