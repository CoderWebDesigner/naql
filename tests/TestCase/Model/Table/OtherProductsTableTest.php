<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\OtherProductsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\OtherProductsTable Test Case
 */
class OtherProductsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\OtherProductsTable
     */
    public $OtherProducts;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.other_products',
        'app.creator',
        'app.user_groups',
        'app.editor',
        'app.login_tokens',
        'app.users',
        'app.productive_families',
        'app.families_services',
        'app.reservations',
        'app.salons',
        'app.states',
        'app.areas',
        'app.rates',
        'app.salon_services',
        'app.service_icons',
        'app.products',
        'app.scheduled_email_recipients',
        'app.scheduled_emails',
        'app.user_emails',
        'app.user_email_recipients',
        'app.user_activities',
        'app.user_contacts',
        'app.user_details',
        'app.user_email_signatures',
        'app.user_email_templates',
        'app.user_socials',
        'app.user_group_permissions'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('OtherProducts') ? [] : ['className' => 'App\Model\Table\OtherProductsTable'];
        $this->OtherProducts = TableRegistry::get('OtherProducts', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->OtherProducts);

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
