<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\TafaseerTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\TafaseerTable Test Case
 */
class TafaseerTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\TafaseerTable
     */
    public $Tafaseer;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.tafaseer',
        'app.creator',
        'app.editor',
        'app.parts',
        'app.quraan',
        'app.tafaseers',
        'app.tafaseer_parts',
        'app.other_tafaseer'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Tafaseer') ? [] : ['className' => 'App\Model\Table\TafaseerTable'];
        $this->Tafaseer = TableRegistry::get('Tafaseer', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Tafaseer);

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
