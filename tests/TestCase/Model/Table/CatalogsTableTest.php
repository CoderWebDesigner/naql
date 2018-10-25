<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\CatalogsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\CatalogsTable Test Case
 */
class CatalogsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\CatalogsTable
     */
    public $Catalogs;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.catalogs',
        'app.creator',
        'app.user_groups',
        'app.editor',
        'app.comments',
        'app.users',
        'app.login_tokens',
        'app.orders',
        'app.pharmacies',
        'app.areas',
        'app.cities',
        'app.offers',
        'app.reservations',
        'app.receipts',
        'app.drugs',
        'app.olddata',
        'app.rates',
        'app.viewers',
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
        $config = TableRegistry::exists('Catalogs') ? [] : ['className' => 'App\Model\Table\CatalogsTable'];
        $this->Catalogs = TableRegistry::get('Catalogs', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Catalogs);

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
