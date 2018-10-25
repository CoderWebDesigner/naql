<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\SewarTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\SewarTable Test Case
 */
class SewarTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\SewarTable
     */
    public $Sewar;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.sewar',
        'app.creator',
        'app.editor',
        'app.soras'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Sewar') ? [] : ['className' => 'App\Model\Table\SewarTable'];
        $this->Sewar = TableRegistry::get('Sewar', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Sewar);

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
