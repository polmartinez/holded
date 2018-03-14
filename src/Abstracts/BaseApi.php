<?php

namespace Holded\Abstracts;

use Holded\Caller;
use Holded\Exceptions\HoldedException;

abstract class BaseApi
{
    /** @var  Caller $call */
    var $call;

    protected $methods = [];

    protected $pluralizeMethods = [];

    protected $endpoint = '';

    public function __call($name, $arguments)
    {
        if (!in_array($name, $this->methods)) {
            throw new HoldedException("Method {$name} not allowed.");
        }

        return $this->execute($name, $arguments, $this->endpoint);
    }

    public function execute($name, $arguments, $endpoint)
    {
        $this->call->setEndpoint($endpoint, in_array($name, $this->pluralizeMethods));
        $this->call->setMethod($name);
        return $this->call->call($arguments[0] ?? [], $arguments[1] ?? '');
    }
}