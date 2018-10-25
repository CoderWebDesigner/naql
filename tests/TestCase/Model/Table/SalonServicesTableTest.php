<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\SalonServicesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\SalonServicesTable Test Case
 */
class SalonServicesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\SalonServicesTable
     */
    public $SalonServices;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.salon_services',
        'app.creator',
        'app.user_groups',
        'app.editor',
        'app.login_tokens',
        'app.users',
        'app.productive_families',
        'app.families_services',
        'app.reservations',
        'app.salons',
        'app.states',
        'app.areas',
        'app.rates',
        'app.products',
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
        'app.service_icons'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('SalonServices') ? [] : ['className' => 'App\Model\Table\SalonServicesTable'];
        $this->SalonServices = TableRegistry::get('SalonServices', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->SalonServices);

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
