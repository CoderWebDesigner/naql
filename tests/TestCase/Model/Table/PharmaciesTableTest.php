<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\PharmaciesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\PharmaciesTable Test Case
 */
class PharmaciesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\PharmaciesTable
     */
    public $Pharmacies;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.pharmacies',
        'app.creator',
        'app.editor',
        'app.users',
        'app.areas',
        'app.cities',
        'app.comments',
        'app.offers',
        'app.reservations',
        'app.orders',
        'app.rates',
        'app.receipts',
        'app.viewers'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Pharmacies') ? [] : ['className' => 'App\Model\Table\PharmaciesTable'];
        $this->Pharmacies = TableRegistry::get('Pharmacies', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Pharmacies);

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
