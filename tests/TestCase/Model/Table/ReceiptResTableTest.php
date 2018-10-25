<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ReceiptResTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ReceiptResTable Test Case
 */
class ReceiptResTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\ReceiptResTable
     */
    public $ReceiptRes;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.receipt_res',
        'app.creator',
        'app.editor',
        'app.users',
        'app.pharmacies',
        'app.areas',
        'app.drug_res',
        'app.drugs',
        'app.producer_companies',
        'app.drug_types',
        'app.active_materials',
        'app.groups',
        'app.offer_res',
        'app.offers',
        'app.receipts'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('ReceiptRes') ? [] : ['className' => 'App\Model\Table\ReceiptResTable'];
        $this->ReceiptRes = TableRegistry::get('ReceiptRes', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->ReceiptRes);

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
