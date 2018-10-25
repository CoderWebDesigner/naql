<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\OrderTypesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\OrderTypesTable Test Case
 */
class OrderTypesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\OrderTypesTable
     */
    public $OrderTypes;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.order_types',
        'app.creator',
        'app.user_groups',
        'app.black_lists',
        'app.editor',
        'app.login_tokens',
        'app.order_details',
        'app.cash_types',
        'app.users',
        'app.orders',
        'app.delivery_times',
        'app.clients',
        'app.stores',
        'app.scheduled_email_recipients',
        'app.user_activities',
        'app.user_contacts',
        'app.user_details',
        'app.user_email_recipients',
        'app.user_email_signatures',
        'app.user_email_templates',
        'app.user_socials'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('OrderTypes') ? [] : ['className' => 'App\Model\Table\OrderTypesTable'];
        $this->OrderTypes = TableRegistry::get('OrderTypes', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->OrderTypes);

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
