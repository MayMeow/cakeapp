<?php
namespace CakeService\Test\TestCase\Model\Table;

use CakeService\Model\Table\MilestonesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * CakeService\Model\Table\MilestonesTable Test Case
 */
class MilestonesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \CakeService\Model\Table\MilestonesTable
     */
    public $Milestones;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'plugin.cake_service.milestones'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Milestones') ? [] : ['className' => MilestonesTable::class];
        $this->Milestones = TableRegistry::get('Milestones', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Milestones);

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
