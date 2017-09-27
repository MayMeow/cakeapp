<?php
namespace CakeNetworking\Test\TestCase\Model\Table;

use CakeNetworking\Model\Table\DnsValuesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * CakeNetworking\Model\Table\DnsValuesTable Test Case
 */
class DnsValuesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \CakeNetworking\Model\Table\DnsValuesTable
     */
    public $DnsValues;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'plugin.cake_networking.dns_values',
        'plugin.cake_networking.dns_record_sets',
        'plugin.cake_networking.domains',
        'plugin.cake_networking.users'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('DnsValues') ? [] : ['className' => 'CakeNetworking\Model\Table\DnsValuesTable'];
        $this->DnsValues = TableRegistry::get('DnsValues', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->DnsValues);

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
