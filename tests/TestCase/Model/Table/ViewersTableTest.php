<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ViewersTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ViewersTable Test Case
 */
class ViewersTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\ViewersTable
     */
    public $Viewers;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.viewers',
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
        $config = TableRegistry::exists('Viewers') ? [] : ['className' => 'App\Model\Table\ViewersTable'];
        $this->Viewers = TableRegistry::get('Viewers', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Viewers);

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
