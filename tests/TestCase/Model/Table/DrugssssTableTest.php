<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\DrugssssTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\DrugssssTable Test Case
 */
class DrugssssTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\DrugssssTable
     */
    public $Drugssss;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.drugssss'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Drugssss') ? [] : ['className' => 'App\Model\Table\DrugssssTable'];
        $this->Drugssss = TableRegistry::get('Drugssss', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Drugssss);

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
}
