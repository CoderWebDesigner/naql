<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ProducerCompaniesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ProducerCompaniesTable Test Case
 */
class ProducerCompaniesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\ProducerCompaniesTable
     */
    public $ProducerCompanies;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.producer_companies',
        'app.creator',
        'app.editor',
        'app.drugs',
        'app.drug_types',
        'app.active_materials',
        'app.sup_groups',
        'app.groups',
        'app.reservations'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('ProducerCompanies') ? [] : ['className' => 'App\Model\Table\ProducerCompaniesTable'];
        $this->ProducerCompanies = TableRegistry::get('ProducerCompanies', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->ProducerCompanies);

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
