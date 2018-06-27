<?php
use Service\HelloService;

class SimpleUnitTest extends \Codeception\Test\Unit
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
    public function testSayHello()
    {
        //Test the service is returning message properly
        $service = new HelloService();

        $this->assertEquals($service->sayHello("Soumadri"), "Hello Soumadri");
    }
}