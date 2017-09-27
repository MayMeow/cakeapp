<?php
namespace CakeService\Test\TestCase\Model\Table;

use CakeService\Model\Table\IssuesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * CakeService\Model\Table\IssuesTable Test Case
 */
class IssuesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \CakeService\Model\Table\IssuesTable
     */
    public $Issues;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'plugin.cake_service.issues',
        //'plugin.cake_service.users',
        //'plugin.cake_service.issues_assignees',
        //'plugin.cake_service.comments',
        //'plugin.cake_service.issues_comments'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Issues') ? [] : ['className' => IssuesTable::class];
        $this->Issues = TableRegistry::get('Issues', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Issues);

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
        // $this->markTestIncomplete('Not implemented yet.');
        $q = $this->Issues->find()->select(['id', 'title'])->first();
        $this->assertInstanceOf('CakeService\Model\Entity\Issue', $q);

        $r = $q->toArray();

        $e = [
            'id' => 1,
            'title' => 'Lorem ipsum dolor sit amet'
        ];

        print_r($e);

        print_r($r);

        $this->assertEquals($e, $r);
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
