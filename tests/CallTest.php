<?php

namespace Ebisbe\Holed\Test;

use Holded\Caller;

class CallTest extends \PHPUnit_Framework_TestCase
{
    /** @var  Caller */
    var $call;

    protected function setUp()
    {
        parent::setUp(); // TODO: Change the autogenerated stub

        $this->call = new Caller();
    }

    public function testSetEndpoint()
    {
        $this->call->setEndpoint('someEndpoint');
        $this->assertEquals('someEndpoint', $this->call->getEndpoint());
    }

    public function testPluralizeEndpoint()
    {
        $this->call->setEndpoint('someEndpoint', true);
        $this->assertEquals('someEndpoints', $this->call->getEndpoint());
    }

    public function testSetMethod()
    {
        $this->call->setMethod(__METHOD__);
        $this->assertEquals('testSetMethod', $this->call->getMethod());
    }

    public function testGetUrl()
    {
        $this->assertEquals('https://app.holded.com/api/v1',
            $this->call->getUrl()
        );

        $this->call->setMethod('someMethod');
        $this->call->setEndpoint('someEndpoint');
        $this->assertEquals('https://app.holded.com/api/v1/someMethod/someEndpoint/id',
            $this->call->getUrl('id')
        );
    }
}