<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\HotelTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\HotelTable Test Case
 */
class HotelTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\HotelTable
     */
    public $Hotel;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.hotel',
        'app.creator',
        'app.editor',
        'app.branches',
        'app.hotels',
        'app.cities',
        'app.bounses',
        'app.users',
        'app.employees'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Hotel') ? [] : ['className' => 'App\Model\Table\HotelTable'];
        $this->Hotel = TableRegistry::get('Hotel', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Hotel);

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
