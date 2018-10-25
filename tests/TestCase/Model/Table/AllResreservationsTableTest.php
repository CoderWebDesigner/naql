<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\AllResreservationsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\AllResreservationsTable Test Case
 */
class AllResreservationsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\AllResreservationsTable
     */
    public $AllResreservations;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.all_resreservations',
        'app.creator',
        'app.user_groups',
        'app.editor',
        'app.login_tokens',
        'app.users',
        'app.others',
        'app.productive_families',
        'app.families_services',
        'app.reservations',
        'app.salons',
        'app.areas',
        'app.rates',
        'app.salon_services',
        'app.service_icons',
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
        'app.salon_reservations',
        'app.work_times',
        'app.family_reservations',
        'app.product_reservations',
        'app.products',
        'app.products_infos'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('AllResreservations') ? [] : ['className' => 'App\Model\Table\AllResreservationsTable'];
        $this->AllResreservations = TableRegistry::get('AllResreservations', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->AllResreservations);

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
