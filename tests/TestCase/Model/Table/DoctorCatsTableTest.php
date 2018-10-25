<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\DoctorCatsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\DoctorCatsTable Test Case
 */
class DoctorCatsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\DoctorCatsTable
     */
    public $DoctorCats;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.doctor_cats',
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
        'app.user_group_permissions',
        'app.doctor_offers'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('DoctorCats') ? [] : ['className' => 'App\Model\Table\DoctorCatsTable'];
        $this->DoctorCats = TableRegistry::get('DoctorCats', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->DoctorCats);

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
