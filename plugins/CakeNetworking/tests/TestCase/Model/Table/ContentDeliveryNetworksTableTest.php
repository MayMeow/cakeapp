<?php
namespace CakeNetworking\Test\TestCase\Model\Table;

use CakeNetworking\Model\Table\ContentDeliveryNetworksTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * CakeNetworking\Model\Table\ContentDeliveryNetworksTable Test Case
 */
class ContentDeliveryNetworksTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \CakeNetworking\Model\Table\ContentDeliveryNetworksTable
     */
    public $ContentDeliveryNetworks;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'plugin.cake_networking.content_delivery_networks',
        'plugin.cake_networking.buckets',
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
        $config = TableRegistry::exists('ContentDeliveryNetworks') ? [] : ['className' => 'CakeNetworking\Model\Table\ContentDeliveryNetworksTable'];
        $this->ContentDeliveryNetworks = TableRegistry::get('ContentDeliveryNetworks', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->ContentDeliveryNetworks);

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
