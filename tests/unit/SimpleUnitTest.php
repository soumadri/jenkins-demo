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

        $this->assertEquals($service->sayHello("TNQ"), "Hello TNQ");
    }

    public function testSayHelloEmpty()
    {
        //Test the service is returning message properly
        $service = new HelloService();

        $this->assertEquals($service->sayHello(""), "Hello Unknown");        
    }

    public function testSayHelloEmptyNegative()
    {
        //Test the service is returning message properly
        $service = new HelloService();
        
        $this->assertNotEquals($service->sayHello(""), "Hello");
    }

    public function testSayHelloInUnicode()
    {
        //Test the service is returning message properly
        $service = new HelloService();

        $this->assertEquals($service->sayHello("உலகம்"), "Hello உலகம்");
    }
}