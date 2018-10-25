<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\UserEmailTemplatesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\UserEmailTemplatesTable Test Case
 */
class UserEmailTemplatesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\UserEmailTemplatesTable
     */
    public $UserEmailTemplates;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.user_email_templates',
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
        $config = TableRegistry::exists('UserEmailTemplates') ? [] : ['className' => 'App\Model\Table\UserEmailTemplatesTable'];
        $this->UserEmailTemplates = TableRegistry::get('UserEmailTemplates', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->UserEmailTemplates);

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
