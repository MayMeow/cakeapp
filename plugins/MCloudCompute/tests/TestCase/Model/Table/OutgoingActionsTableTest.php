<?php
namespace MCloudCompute\Test\TestCase\Model\Table;

use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;
use MCloudCompute\Model\Table\OutgoingActionsTable;

/**
 * MCloudCompute\Model\Table\OutgoingActionsTable Test Case
 */
class OutgoingActionsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \MCloudCompute\Model\Table\OutgoingActionsTable
     */
    public $OutgoingActions;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'plugin.m_cloud_compute.outgoing_actions'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('OutgoingActions') ? [] : ['className' => 'MCloudCompute\Model\Table\OutgoingActionsTable'];
        $this->OutgoingActions = TableRegistry::get('OutgoingActions', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->OutgoingActions);

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
