<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\BankTransfersTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\BankTransfersTable Test Case
 */
class BankTransfersTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\BankTransfersTable
     */
    public $BankTransfers;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.bank_transfers',
        'app.creator',
        'app.user_groups',
        'app.black_lists',
        'app.editor',
        'app.login_tokens',
        'app.order_details',
        'app.cash_types',
        'app.users',
        'app.scheduled_email_recipients',
        'app.user_activities',
        'app.user_contacts',
        'app.user_details',
        'app.user_email_recipients',
        'app.user_email_signatures',
        'app.user_email_templates',
        'app.user_socials',
        'app.order_types'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('BankTransfers') ? [] : ['className' => 'App\Model\Table\BankTransfersTable'];
        $this->BankTransfers = TableRegistry::get('BankTransfers', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->BankTransfers);

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
