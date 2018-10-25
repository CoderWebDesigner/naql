<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\OfferResTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\OfferResTable Test Case
 */
class OfferResTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\OfferResTable
     */
    public $OfferRes;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.offer_res',
        'app.creator',
        'app.editor',
        'app.users',
        'app.pharmacies',
        'app.offers'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('OfferRes') ? [] : ['className' => 'App\Model\Table\OfferResTable'];
        $this->OfferRes = TableRegistry::get('OfferRes', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->OfferRes);

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
