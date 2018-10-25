<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\AdviceviewTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\AdviceviewTable Test Case
 */
class AdviceviewTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\AdviceviewTable
     */
    public $Adviceview;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.adviceview',
        'app.creator',
        'app.editor',
        'app.advices',
        'app.advicecats',
        'app.advicecomments'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Adviceview') ? [] : ['className' => 'App\Model\Table\AdviceviewTable'];
        $this->Adviceview = TableRegistry::get('Adviceview', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Adviceview);

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
