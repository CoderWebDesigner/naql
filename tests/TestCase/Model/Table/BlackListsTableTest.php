<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\BlackListsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\BlackListsTable Test Case
 */
class BlackListsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\BlackListsTable
     */
    public $BlackLists;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.black_lists',
        'app.creator',
        'app.editor',
        'app.users'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('BlackLists') ? [] : ['className' => 'App\Model\Table\BlackListsTable'];
        $this->BlackLists = TableRegistry::get('BlackLists', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->BlackLists);

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
