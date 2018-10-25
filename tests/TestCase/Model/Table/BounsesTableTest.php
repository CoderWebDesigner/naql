<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\BounsesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\BounsesTable Test Case
 */
class BounsesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\BounsesTable
     */
    public $Bounses;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.bounses',
        'app.creator',
        'app.editor',
        'app.branches',
        'app.users',
        'app.employees'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Bounses') ? [] : ['className' => 'App\Model\Table\BounsesTable'];
        $this->Bounses = TableRegistry::get('Bounses', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Bounses);

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
