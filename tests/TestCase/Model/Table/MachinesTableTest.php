<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\MachinesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\MachinesTable Test Case
 */
class MachinesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\MachinesTable
     */
    public $Machines;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.machines',
        'app.creator',
        'app.editor',
        'app.machine_details',
        'app.machine_owners',
        'app.owners',
        'app.reservations'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Machines') ? [] : ['className' => 'App\Model\Table\MachinesTable'];
        $this->Machines = TableRegistry::get('Machines', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Machines);

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
