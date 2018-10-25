<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\MachineDetailsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\MachineDetailsTable Test Case
 */
class MachineDetailsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\MachineDetailsTable
     */
    public $MachineDetails;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.machine_details',
        'app.creator',
        'app.editor',
        'app.machines',
        'app.machine_owners'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('MachineDetails') ? [] : ['className' => 'App\Model\Table\MachineDetailsTable'];
        $this->MachineDetails = TableRegistry::get('MachineDetails', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->MachineDetails);

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
