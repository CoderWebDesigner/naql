<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\MachinePhotosTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\MachinePhotosTable Test Case
 */
class MachinePhotosTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\MachinePhotosTable
     */
    public $MachinePhotos;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.machine_photos',
        'app.machine_owners',
        'app.creator',
        'app.user_groups',
        'app.editor',
        'app.areas',
        'app.users',
        'app.login_tokens',
        'app.messages',
        'app.chats',
        'app.owners',
        'app.rates',
        'app.reservations',
        'app.reservation_types',
        'app.machines',
        'app.machine_details',
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
        $config = TableRegistry::exists('MachinePhotos') ? [] : ['className' => 'App\Model\Table\MachinePhotosTable'];
        $this->MachinePhotos = TableRegistry::get('MachinePhotos', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->MachinePhotos);

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
