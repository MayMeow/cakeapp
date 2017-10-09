<?php
namespace CakeResource\Test\TestCase\Model\Table;

use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;
use CakeResource\Model\Table\OwnedResourcesTable;

/**
 * CakeResource\Model\Table\OwnedResourcesTable Test Case
 */
class OwnedResourcesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \CakeResource\Model\Table\OwnedResourcesTable
     */
    public $OwnedResources;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        //'plugin.cake_resource.owned_resources',
        'plugin.cake_resource.projects',
        'plugin.cake_auth.users',
        'plugin.cake_resource.resource_classes'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('OwnedResources') ? [] : ['className' => 'MCloudResources\Model\Table\OwnedResourcesTable'];
        $this->OwnedResources = TableRegistry::get('OwnedResources', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->OwnedResources);

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
