<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ScheduledEmailRecipientsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ScheduledEmailRecipientsTable Test Case
 */
class ScheduledEmailRecipientsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\ScheduledEmailRecipientsTable
     */
    public $ScheduledEmailRecipients;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.scheduled_email_recipients',
        'app.creator',
        'app.editor',
        'app.scheduled_emails',
        'app.users'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('ScheduledEmailRecipients') ? [] : ['className' => 'App\Model\Table\ScheduledEmailRecipientsTable'];
        $this->ScheduledEmailRecipients = TableRegistry::get('ScheduledEmailRecipients', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->ScheduledEmailRecipients);

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
