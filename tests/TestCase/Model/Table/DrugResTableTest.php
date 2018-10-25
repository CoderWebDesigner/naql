<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\DrugResTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\DrugResTable Test Case
 */
class DrugResTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\DrugResTable
     */
    public $DrugRes;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.drug_res',
        'app.creator',
        'app.editor',
        'app.users',
        'app.pharmacies',
        'app.drugs'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('DrugRes') ? [] : ['className' => 'App\Model\Table\DrugResTable'];
        $this->DrugRes = TableRegistry::get('DrugRes', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->DrugRes);

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
