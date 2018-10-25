<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\SorasTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\SorasTable Test Case
 */
class SorasTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\SorasTable
     */
    public $Soras;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.soras',
        'app.creator',
        'app.editor'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Soras') ? [] : ['className' => 'App\Model\Table\SorasTable'];
        $this->Soras = TableRegistry::get('Soras', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Soras);

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
