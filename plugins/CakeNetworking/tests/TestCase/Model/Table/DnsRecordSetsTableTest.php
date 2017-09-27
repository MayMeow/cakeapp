<?php
namespace CakeNetworking\Test\TestCase\Model\Table;

use CakeNetworking\Model\Table\DnsRecordSetsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * CakeNetworking\Model\Table\DnsRecordSetsTable Test Case
 */
class DnsRecordSetsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \CakeNetworking\Model\Table\DnsRecordSetsTable
     */
    public $DnsRecordSets;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'plugin.cake_networking.dns_record_sets',
        'plugin.cake_networking.domains',
        'plugin.cake_networking.users',
        'plugin.cake_networking.dns_values'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('DnsRecordSets') ? [] : ['className' => 'CakeNetworking\Model\Table\DnsRecordSetsTable'];
        $this->DnsRecordSets = TableRegistry::get('DnsRecordSets', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->DnsRecordSets);

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
