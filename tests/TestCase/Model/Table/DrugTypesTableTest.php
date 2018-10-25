<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\DrugTypesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\DrugTypesTable Test Case
 */
class DrugTypesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\DrugTypesTable
     */
    public $DrugTypes;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.drug_types',
        'app.creator',
        'app.editor',
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
        $config = TableRegistry::exists('DrugTypes') ? [] : ['className' => 'App\Model\Table\DrugTypesTable'];
        $this->DrugTypes = TableRegistry::get('DrugTypes', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->DrugTypes);

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
