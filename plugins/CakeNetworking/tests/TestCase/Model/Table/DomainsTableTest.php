<?php
namespace CakeNetworking\Test\TestCase\Model\Table;

use CakeNetworking\Model\Table\DomainsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * CakeNetworking\Model\Table\DomainsTable Test Case
 */
class DomainsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \CakeNetworking\Model\Table\DomainsTable
     */
    public $Domains;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
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
        $config = TableRegistry::exists('Domains') ? [] : ['className' => 'CakeNetworking\Model\Table\DomainsTable'];
        $this->Domains = TableRegistry::get('Domains', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Domains);

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
