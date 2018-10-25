<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\UserContactsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\UserContactsTable Test Case
 */
class UserContactsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\UserContactsTable
     */
    public $UserContacts;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.user_contacts',
        'app.creator',
        'app.editor',
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
        $config = TableRegistry::exists('UserContacts') ? [] : ['className' => 'App\Model\Table\UserContactsTable'];
        $this->UserContacts = TableRegistry::get('UserContacts', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->UserContacts);

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
