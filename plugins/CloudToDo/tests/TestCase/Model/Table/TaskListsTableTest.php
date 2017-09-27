<?php
namespace CloudToDo\Test\TestCase\Model\Table;

use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;
use CloudToDo\Model\Table\TaskListsTable;

/**
 * CloudToDo\Model\Table\TaskListsTable Test Case
 */
class TaskListsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \CloudToDo\Model\Table\TaskListsTable
     */
    public $TaskLists;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'plugin.cloud_to_do.task_lists',
        'plugin.cloud_to_do.users',
        'plugin.cloud_to_do.tasks'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('TaskLists') ? [] : ['className' => 'CloudToDo\Model\Table\TaskListsTable'];
        $this->TaskLists = TableRegistry::get('TaskLists', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->TaskLists);

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
