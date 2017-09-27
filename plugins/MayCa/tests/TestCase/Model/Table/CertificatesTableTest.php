<?php
namespace MayCa\Test\TestCase\Model\Table;

use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;
use MayCa\Model\Table\CertificatesTable;

/**
 * MayCa\Model\Table\CertificatesTable Test Case
 */
class CertificatesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \MayCa\Model\Table\CertificatesTable
     */
    public $Certificates;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'plugin.may_ca.certificates'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Certificates') ? [] : ['className' => 'MayCa\Model\Table\CertificatesTable'];
        $this->Certificates = TableRegistry::get('Certificates', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Certificates);

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
