<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\MachineOwnersTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\MachineOwnersTable Test Case
 */
class MachineOwnersTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\MachineOwnersTable
     */
    public $MachineOwners;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.machine_owners',
        'app.creator',
        'app.editor',
        'app.machine_details',
        'app.machines',
        'app.owners'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('MachineOwners') ? [] : ['className' => 'App\Model\Table\MachineOwnersTable'];
        $this->MachineOwners = TableRegistry::get('MachineOwners', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->MachineOwners);

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
