<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\StaticPagesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\StaticPagesTable Test Case
 */
class StaticPagesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\StaticPagesTable
     */
    public $StaticPages;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.static_pages',
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
        $config = TableRegistry::exists('StaticPages') ? [] : ['className' => 'App\Model\Table\StaticPagesTable'];
        $this->StaticPages = TableRegistry::get('StaticPages', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->StaticPages);

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
