<?php
namespace MCloudResources\Test\TestCase\Model\Table;

use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;
use MCloudResources\Model\Table\ResourceGroupsTable;

/**
 * MCloudResources\Model\Table\ResourceGroupsTable Test Case
 */
class ResourceGroupsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \MCloudResources\Model\Table\ResourceGroupsTable
     */
    public $ResourceGroups;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'plugin.m_cloud_resources.resource_groups',
        'plugin.m_cloud_resources.users'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('ResourceGroups') ? [] : ['className' => 'MCloudResources\Model\Table\ResourceGroupsTable'];
        $this->ResourceGroups = TableRegistry::get('ResourceGroups', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->ResourceGroups);

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
