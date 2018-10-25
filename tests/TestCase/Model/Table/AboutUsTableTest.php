<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\AboutUsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\AboutUsTable Test Case
 */
class AboutUsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\AboutUsTable
     */
    public $AboutUs;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.about_us',
        'app.creator',
        'app.user_groups',
        'app.editor',
        'app.login_tokens',
        'app.users',
        'app.messages',
        'app.chats',
        'app.frommm',
        'app.owners',
        'app.areas',
        'app.machine_owners',
        'app.machine_details',
        'app.machines',
        'app.reservations',
        'app.reservation_types',
        'app.owner_prices',
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
        'app.tooo',
        'app.chatss',
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
        $config = TableRegistry::exists('AboutUs') ? [] : ['className' => 'App\Model\Table\AboutUsTable'];
        $this->AboutUs = TableRegistry::get('AboutUs', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->AboutUs);

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
