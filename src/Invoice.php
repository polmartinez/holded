<?php

namespace Holded;

use Holded\Abstracts\BaseApi;

class Invoice extends BaseApi
{
    protected $methods = ['get', 'find', 'add', 'update', 'delete'];

    protected $endpoint = 'doc/invoice';

    public function __construct(Caller $call)
    {
        $this->call = $call;
    }

    public function pay($params, $id)
    {
        return $this->execute(__METHOD__, func_get_args(), 'invoice');
    }
}