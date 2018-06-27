<?php

use Antelope\AccountManager;

class SampleUnitTest extends \Codeception\Test\Unit
{
    /**
     * @var \UnitTester
     */
    protected $tester;

    protected function _before()
    {
    }

    protected function _after()
    {
    }

    // tests
    public function testHelloWorld()
    {
        $test_var = "HelloTest";
        $this->assertEquals("HelloTest",$test_var);
    }

    public function testGetUserDetails()
    {
        $userId = "Soumadri";
        $accountManager = new AccountManager();
        $details = $accountManager->getUserDetails($userId);
        $this->assertEquals("Hello Soumadri",$details);
    }
}