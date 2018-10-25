<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\DoctorOffersTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\DoctorOffersTable Test Case
 */
class DoctorOffersTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\DoctorOffersTable
     */
    public $DoctorOffers;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.doctor_offers',
        'app.creator',
        'app.user_groups',
        'app.editor',
        'app.comments',
        'app.users',
        'app.login_tokens',
        'app.orders',
        'app.pharmacies',
        'app.areas',
        'app.cities',
        'app.offers',
        'app.reservations',
        'app.receipts',
        'app.drugs',
        'app.olddata',
        'app.rates',
        'app.viewers',
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
        $config = TableRegistry::exists('DoctorOffers') ? [] : ['className' => 'App\Model\Table\DoctorOffersTable'];
        $this->DoctorOffers = TableRegistry::get('DoctorOffers', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->DoctorOffers);

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
