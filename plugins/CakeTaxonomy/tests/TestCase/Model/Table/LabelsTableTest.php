<?php
namespace CakeTaxonomy\Test\TestCase\Model\Table;

use CakeTaxonomy\Model\Table\LabelsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * CakeTaxonomy\Model\Table\LabelsTable Test Case
 */
class LabelsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \CakeTaxonomy\Model\Table\LabelsTable
     */
    public $Labels;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'plugin.cake_taxonomy.labels'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Labels') ? [] : ['className' => LabelsTable::class];
        $this->Labels = TableRegistry::get('Labels', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Labels);

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
