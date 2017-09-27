<?php
namespace CakeStorage\Test\TestCase\Model\Table;

use CakeStorage\Model\Table\GitRepositoriesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * CakeStorage\Model\Table\GitRepositoriesTable Test Case
 */
class GitRepositoriesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \CakeStorage\Model\Table\GitRepositoriesTable
     */
    public $GitRepositories;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'plugin.cake_storage.git_repositories',
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
        $config = TableRegistry::exists('GitRepositories') ? [] : ['className' => GitRepositoriesTable::class];
        $this->GitRepositories = TableRegistry::get('GitRepositories', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->GitRepositories);

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
