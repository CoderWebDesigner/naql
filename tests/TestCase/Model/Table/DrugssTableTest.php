<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\DrugssTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\DrugssTable Test Case
 */
class DrugssTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\DrugssTable
     */
    public $Drugss;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.drugss',
        'app.creator',
        'app.user_groups',
        'app.editor',
        'app.login_tokens',
        'app.users',
        'app.orders',
        'app.reservations',
        'app.pharmacies',
        'app.areas',
        'app.offers',
        'app.viewers',
        'app.receipts',
        'app.drugs',
        'app.producer_companies',
        'app.drug_types',
        'app.active_materials',
        'app.sup_groups',
        'app.groups',
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
        $config = TableRegistry::exists('Drugss') ? [] : ['className' => 'App\Model\Table\DrugssTable'];
        $this->Drugss = TableRegistry::get('Drugss', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Drugss);

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
