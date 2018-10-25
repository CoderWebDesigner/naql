<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\AdvicecommentsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\AdvicecommentsTable Test Case
 */
class AdvicecommentsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\AdvicecommentsTable
     */
    public $Advicecomments;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.advicecomments',
        'app.creator',
        'app.editor',
        'app.advices'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Advicecomments') ? [] : ['className' => 'App\Model\Table\AdvicecommentsTable'];
        $this->Advicecomments = TableRegistry::get('Advicecomments', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Advicecomments);

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
