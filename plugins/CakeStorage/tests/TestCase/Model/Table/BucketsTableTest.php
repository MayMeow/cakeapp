<?php
namespace CakeStorage\Test\TestCase\Model\Table;

use CakeStorage\Model\Table\BucketsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * CakeStorage\Model\Table\BucketsTable Test Case
 */
class BucketsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \CakeStorage\Model\Table\BucketsTable
     */
    public $Buckets;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'plugin.cake_storage.buckets'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Buckets') ? [] : ['className' => 'CakeStorage\Model\Table\BucketsTable'];
        $this->Buckets = TableRegistry::get('Buckets', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Buckets);

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
