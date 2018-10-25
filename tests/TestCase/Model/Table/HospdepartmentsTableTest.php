<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\HospdepartmentsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\HospdepartmentsTable Test Case
 */
class HospdepartmentsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\HospdepartmentsTable
     */
    public $Hospdepartments;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.hospdepartments',
        'app.hospitals'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Hospdepartments') ? [] : ['className' => 'App\Model\Table\HospdepartmentsTable'];
        $this->Hospdepartments = TableRegistry::get('Hospdepartments', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Hospdepartments);

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
