<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\SettingOptionsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\SettingOptionsTable Test Case
 */
class SettingOptionsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\SettingOptionsTable
     */
    public $SettingOptions;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.setting_options',
        'app.creator',
        'app.editor',
        'app.user_setting_options'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('SettingOptions') ? [] : ['className' => 'App\Model\Table\SettingOptionsTable'];
        $this->SettingOptions = TableRegistry::get('SettingOptions', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->SettingOptions);

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
