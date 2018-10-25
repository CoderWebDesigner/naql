<?php
namespace App\Test\TestCase\Model\Behavior;

use App\Model\Behavior\BeforefindBehavior;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Behavior\BeforefindBehavior Test Case
 */
class BeforefindBehaviorTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Behavior\BeforefindBehavior
     */
    public $Beforefind;

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $this->Beforefind = new BeforefindBehavior();
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Beforefind);

        parent::tearDown();
    }

    /**
     * Test initial setup
     *
     * @return void
     */
    public function testInitialization()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
