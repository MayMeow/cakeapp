<?php
namespace MCloudResources\Test\TestCase\Model\Table;

use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;
use MCloudResources\Model\Table\ResourceClassesTable;

/**
 * MCloudResources\Model\Table\ResourceClassesTable Test Case
 */
class ResourceClassesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \MCloudResources\Model\Table\ResourceClassesTable
     */
    public $ResourceClasses;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'plugin.m_cloud_resources.resource_classes'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('ResourceClasses') ? [] : ['className' => 'MCloudResources\Model\Table\ResourceClassesTable'];
        $this->ResourceClasses = TableRegistry::get('ResourceClasses', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->ResourceClasses);

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
}
