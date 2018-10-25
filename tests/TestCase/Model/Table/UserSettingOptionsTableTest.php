<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\UserSettingOptionsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\UserSettingOptionsTable Test Case
 */
class UserSettingOptionsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\UserSettingOptionsTable
     */
    public $UserSettingOptions;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.user_setting_options',
        'app.creator',
        'app.editor',
        'app.user_settings',
        'app.setting_options'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('UserSettingOptions') ? [] : ['className' => 'App\Model\Table\UserSettingOptionsTable'];
        $this->UserSettingOptions = TableRegistry::get('UserSettingOptions', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->UserSettingOptions);

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
