<?php

namespace Holded;

use Holded\Abstracts\BaseApi;

class Entry extends BaseApi
{
    protected $methods = ['add', 'get', 'delete'];

    protected $endpoint = 'entry';

    public function __construct(Caller $call)
    {
        $this->call = $call;
    }
}