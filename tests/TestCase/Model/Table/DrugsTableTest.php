<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\DrugsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\DrugsTable Test Case
 */
class DrugsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\DrugsTable
     */
    public $Drugs;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.drugs',
        'app.creator',
        'app.editor',
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
        $config = TableRegistry::exists('Drugs') ? [] : ['className' => 'App\Model\Table\DrugsTable'];
        $this->Drugs = TableRegistry::get('Drugs', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Drugs);

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
