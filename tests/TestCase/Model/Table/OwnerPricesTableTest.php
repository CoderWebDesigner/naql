<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\OwnerPricesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\OwnerPricesTable Test Case
 */
class OwnerPricesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\OwnerPricesTable
     */
    public $OwnerPrices;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.owner_prices',
        'app.creator',
        'app.user_groups',
        'app.editor',
        'app.login_tokens',
        'app.users',
        'app.messages',
        'app.chats',
        'app.owners',
        'app.areas',
        'app.machine_owners',
        'app.machine_details',
        'app.machines',
        'app.reservations',
        'app.reservation_types',
        'app.machine_photos',
        'app.rates',
        'app.scheduled_email_recipients',
        'app.scheduled_emails',
        'app.user_emails',
        'app.user_email_recipients',
        'app.user_activities',
        'app.user_contacts',
        'app.user_details',
        'app.user_email_signatures',
        'app.user_email_templates',
        'app.user_socials',
        'app.user_group_permissions'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('OwnerPrices') ? [] : ['className' => 'App\Model\Table\OwnerPricesTable'];
        $this->OwnerPrices = TableRegistry::get('OwnerPrices', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->OwnerPrices);

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
