<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\FinalisaTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\FinalisaTable Test Case
 */
class FinalisaTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\FinalisaTable
     */
    public $Finalisa;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.finalisa',
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
        $config = TableRegistry::exists('Finalisa') ? [] : ['className' => 'App\Model\Table\FinalisaTable'];
        $this->Finalisa = TableRegistry::get('Finalisa', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Finalisa);

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
