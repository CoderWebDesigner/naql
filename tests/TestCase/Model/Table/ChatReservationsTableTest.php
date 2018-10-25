<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ChatReservationsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ChatReservationsTable Test Case
 */
class ChatReservationsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\ChatReservationsTable
     */
    public $ChatReservations;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.chat_reservations',
        'app.creator',
        'app.user_groups',
        'app.editor',
        'app.comments',
        'app.users',
        'app.login_tokens',
        'app.orders',
        'app.reservations',
        'app.pharmacies',
        'app.areas',
        'app.cities',
        'app.offers',
        'app.rates',
        'app.receipts',
        'app.viewers',
        'app.doctor_offers',
        'app.doctor_cats',
        'app.drugs',
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
        $config = TableRegistry::exists('ChatReservations') ? [] : ['className' => 'App\Model\Table\ChatReservationsTable'];
        $this->ChatReservations = TableRegistry::get('ChatReservations', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->ChatReservations);

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
