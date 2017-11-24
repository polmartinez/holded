<?php

namespace Holded;

use Holded\Abstracts\BaseApi;

class Products extends BaseApi
{
    protected $methods = ['get', 'find', 'add', 'update', 'delete'];

    protected $pluralizeMethods = ['get'];

    protected $endpoint = 'product';

    public function __construct(Caller $call)
    {
        $this->call = $call;
    }
}