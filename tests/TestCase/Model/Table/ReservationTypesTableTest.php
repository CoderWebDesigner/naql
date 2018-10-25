<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ReservationTypesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ReservationTypesTable Test Case
 */
class ReservationTypesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\ReservationTypesTable
     */
    public $ReservationTypes;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.reservation_types',
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
        $config = TableRegistry::exists('ReservationTypes') ? [] : ['className' => 'App\Model\Table\ReservationTypesTable'];
        $this->ReservationTypes = TableRegistry::get('ReservationTypes', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->ReservationTypes);

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
