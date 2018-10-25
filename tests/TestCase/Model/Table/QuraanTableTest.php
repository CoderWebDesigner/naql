<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\QuraanTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\QuraanTable Test Case
 */
class QuraanTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\QuraanTable
     */
    public $Quraan;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.quraan',
        'app.creator',
        'app.editor',
        'app.tafaseers',
        'app.parts',
        'app.tafaseer',
        'app.tafaseer_parts'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Quraan') ? [] : ['className' => 'App\Model\Table\QuraanTable'];
        $this->Quraan = TableRegistry::get('Quraan', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Quraan);

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
