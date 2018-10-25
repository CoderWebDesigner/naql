<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\LoginTokensTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\LoginTokensTable Test Case
 */
class LoginTokensTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\LoginTokensTable
     */
    public $LoginTokens;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.login_tokens',
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
        $config = TableRegistry::exists('LoginTokens') ? [] : ['className' => 'App\Model\Table\LoginTokensTable'];
        $this->LoginTokens = TableRegistry::get('LoginTokens', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->LoginTokens);

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
