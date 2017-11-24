<?php

namespace Holded;

use Holded\Abstracts\BaseApi;

class CreditNote extends BaseApi
{
    protected $methods = ['get', 'find', 'add', 'update', 'delete'];

    protected $endpoint = 'doc/creditnote';

    public function __construct(Caller $call)
    {
        $this->call = $call;
    }
}