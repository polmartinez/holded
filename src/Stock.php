<?php

namespace Holded;

use Holded\Abstracts\BaseApi;

class Stock extends BaseApi
{
    protected $methods = ['update'];

    protected $endpoint = 'product/stock';

    public function __construct(Caller $call)
    {
        $this->call = $call;
    }
}