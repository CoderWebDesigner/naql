<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\AdvicecatsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\AdvicecatsTable Test Case
 */
class AdvicecatsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\AdvicecatsTable
     */
    public $Advicecats;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.advicecats',
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
        $config = TableRegistry::exists('Advicecats') ? [] : ['className' => 'App\Model\Table\AdvicecatsTable'];
        $this->Advicecats = TableRegistry::get('Advicecats', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Advicecats);

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
