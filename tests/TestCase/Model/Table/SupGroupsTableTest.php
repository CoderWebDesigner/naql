<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\SupGroupsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\SupGroupsTable Test Case
 */
class SupGroupsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\SupGroupsTable
     */
    public $SupGroups;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.sup_groups',
        'app.creator',
        'app.editor',
        'app.groups',
        'app.drugs',
        'app.producer_companies',
        'app.drug_types',
        'app.active_materials',
        'app.reservations',
        'app.users',
        'app.pharmacies',
        'app.areas',
        'app.offers',
        'app.viewers',
        'app.receipts',
        'app.orders'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('SupGroups') ? [] : ['className' => 'App\Model\Table\SupGroupsTable'];
        $this->SupGroups = TableRegistry::get('SupGroups', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->SupGroups);

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
