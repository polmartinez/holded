<?php

namespace Holded;

use Holded\Abstracts\BaseApi;

class Numbering extends BaseApi
{
    protected $methods = ['add', 'get'];

    protected $endpoint = 'numbering';

    public function __construct(Caller $call)
    {
        $this->call = $call;
    }

    public function update($params, $id, $type)
    {
        return $this->execute(__METHOD__, func_get_args(), $this->endpoint . '/' . $type);
    }

    public function delete($id, $type)
    {
        return $this->execute(__METHOD__, [[], $id], $this->endpoint . '/' . $type);
    }
}