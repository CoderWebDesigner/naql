<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\UserEmailRecipientsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\UserEmailRecipientsTable Test Case
 */
class UserEmailRecipientsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\UserEmailRecipientsTable
     */
    public $UserEmailRecipients;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.user_email_recipients',
        'app.creator',
        'app.editor',
        'app.user_emails',
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
        $config = TableRegistry::exists('UserEmailRecipients') ? [] : ['className' => 'App\Model\Table\UserEmailRecipientsTable'];
        $this->UserEmailRecipients = TableRegistry::get('UserEmailRecipients', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->UserEmailRecipients);

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
