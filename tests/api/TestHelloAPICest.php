<?php


class TestHelloAPICest
{
    public function _before(ApiTester $I)
    {
    }

    public function _after(ApiTester $I)
    {
    }

    // tests
    public function testSayHello(ApiTester $I)
    {
        $I->sendPOST('/post',['name'=>'Soumadri']);
        $I->seeResponseCodeIs(\Codeception\Util\HttpCode::OK);
        $I->seeResponseContains('Hello Soumadri');
    }
}
