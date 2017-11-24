<?php

namespace Holded;

use Holded\Abstracts\BaseApi;

class SalesOrder extends BaseApi
{
    protected $methods = ['get', 'find', 'add', 'update', 'delete'];

    protected $endpoint = 'doc/salesorder';

    public function __construct(Caller $call)
    {
        $this->call = $call;
    }
}