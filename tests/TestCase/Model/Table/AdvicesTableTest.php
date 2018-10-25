<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\AdvicesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\AdvicesTable Test Case
 */
class AdvicesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\AdvicesTable
     */
    public $Advices;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.advices',
        'app.creator',
        'app.editor',
        'app.advicecats',
        'app.advicecomments',
        'app.adviceview'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Advices') ? [] : ['className' => 'App\Model\Table\AdvicesTable'];
        $this->Advices = TableRegistry::get('Advices', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Advices);

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
