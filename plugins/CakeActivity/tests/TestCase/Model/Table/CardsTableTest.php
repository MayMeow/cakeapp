<?php
namespace CakeActivity\Test\TestCase\Model\Table;

use CakeActivity\Model\Table\CardsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * CakeActivity\Model\Table\CardsTable Test Case
 */
class CardsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \CakeActivity\Model\Table\CardsTable
     */
    public $Cards;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'plugin.cake_activity.cards'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Cards') ? [] : ['className' => CardsTable::class];
        $this->Cards = TableRegistry::get('Cards', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Cards);

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
