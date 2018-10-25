<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ProductiveFamiliesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ProductiveFamiliesTable Test Case
 */
class ProductiveFamiliesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\ProductiveFamiliesTable
     */
    public $ProductiveFamilies;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.productive_families',
        'app.creator',
        'app.user_groups',
        'app.editor',
        'app.login_tokens',
        'app.users',
        'app.products',
        'app.salons',
        'app.states',
        'app.areas',
        'app.rates',
        'app.reservations',
        'app.salon_services',
        'app.service_icons',
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
        'app.user_group_permissions',
        'app.families_services'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('ProductiveFamilies') ? [] : ['className' => 'App\Model\Table\ProductiveFamiliesTable'];
        $this->ProductiveFamilies = TableRegistry::get('ProductiveFamilies', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->ProductiveFamilies);

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
