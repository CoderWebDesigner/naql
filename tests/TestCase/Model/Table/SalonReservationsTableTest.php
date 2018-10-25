<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\SalonReservationsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\SalonReservationsTable Test Case
 */
class SalonReservationsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\SalonReservationsTable
     */
    public $SalonReservations;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.salon_reservations',
        'app.creator',
        'app.user_groups',
        'app.editor',
        'app.login_tokens',
        'app.users',
        'app.others',
        'app.productive_families',
        'app.families_services',
        'app.reservations',
        'app.salon_services',
        'app.salons',
        'app.states',
        'app.areas',
        'app.rates',
        'app.service_icons',
        'app.products',
        'app.products_infos',
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
        'app.user_group_permissions',
        'app.work_times'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('SalonReservations') ? [] : ['className' => 'App\Model\Table\SalonReservationsTable'];
        $this->SalonReservations = TableRegistry::get('SalonReservations', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->SalonReservations);

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
