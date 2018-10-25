<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ActiveMaterialsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ActiveMaterialsTable Test Case
 */
class ActiveMaterialsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\ActiveMaterialsTable
     */
    public $ActiveMaterials;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.active_materials',
        'app.creator',
        'app.editor',
        'app.drugs'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('ActiveMaterials') ? [] : ['className' => 'App\Model\Table\ActiveMaterialsTable'];
        $this->ActiveMaterials = TableRegistry::get('ActiveMaterials', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->ActiveMaterials);

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
