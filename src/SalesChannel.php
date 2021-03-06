<?php

namespace Holded;

use Holded\Abstracts\BaseApi;

class SalesChannel extends BaseApi
{
    protected $methods = ['get', 'add', 'update', 'delete'];

    protected $endpoint = 'saleschannels';

    public function __construct(Caller $call)
    {
        $this->call = $call;
    }
}