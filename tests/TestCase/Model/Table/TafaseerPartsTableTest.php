<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\TafaseerPartsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\TafaseerPartsTable Test Case
 */
class TafaseerPartsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\TafaseerPartsTable
     */
    public $TafaseerParts;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.tafaseer_parts',
        'app.creator',
        'app.editor',
        'app.tafaseers',
        'app.parts',
        'app.quraan',
        'app.tafaseer',
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
        $config = TableRegistry::exists('TafaseerParts') ? [] : ['className' => 'App\Model\Table\TafaseerPartsTable'];
        $this->TafaseerParts = TableRegistry::get('TafaseerParts', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->TafaseerParts);

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
