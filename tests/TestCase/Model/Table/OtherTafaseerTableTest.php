<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\OtherTafaseerTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\OtherTafaseerTable Test Case
 */
class OtherTafaseerTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\OtherTafaseerTable
     */
    public $OtherTafaseer;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.other_tafaseer',
        'app.creator',
        'app.editor',
        'app.tafaseers'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('OtherTafaseer') ? [] : ['className' => 'App\Model\Table\OtherTafaseerTable'];
        $this->OtherTafaseer = TableRegistry::get('OtherTafaseer', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->OtherTafaseer);

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
