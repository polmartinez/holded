<?php

namespace Ebisbe\Holed\Test;

use Holded\Api;

/**
 * @runTestsInSeparateProcesses
 */
class ApiTest extends \PHPUnit_Framework_TestCase
{

    public function invalidTokens()
    {
        return [
            'empty'        => [ '' ],
            'a'            => [ 'a' ],
            'ab'           => [ 'ab' ],
            'abc'          => [ 'abc' ],
            'digit'        => [ 1 ],
            'double-digit' => [ 12 ],
            'triple-digit' => [ 123 ],
            'bool'         => [ true ],
            'array'        => [ ['token'] ],
        ];
    }

    public function validTokens()
    {
        return [
            'token'      => [ 'token' ],
            'short-hash' => [ '123456789' ],
            'full-hash'  => [ 'akrwejhtn983z420qrzc8397r4' ],
        ];
    }

    /**
     * @dataProvider invalidTokens
     */
    public function testSetTokenRaisesExceptionOnInvalidToken($token)
    {
        $this->setExpectedException('InvalidArgumentException');
        Api::setToken($token);
    }

    /**
     * @dataProvider validTokens
     */
    public function testSetTokenSucceedsOnValidToken($token)
    {
        Api::setToken($token);
        $api = new Api();
        $this->assertInstanceOf('\Holded\Api', $api);
    }

    public function testInstantiationWithNoGlobalTokenAndNoArgumentRaisesAnException()
    {
        $this->setExpectedException('Holded\Exceptions\HoldedException');
        new Api();
    }

    public function testInstantiationWithGlobalTokenAndNoArgumentSucceeds()
    {
        Api::setToken('token');
        $api = new Api();
        $this->assertInstanceOf('\Holded\Api', $api);
    }

    public function testInstantiationWithNoGlobalTokenButWithArgumentSucceeds()
    {
        $api = new Api('token');
        $this->assertInstanceOf('\Holded\Api', $api);
    }
}