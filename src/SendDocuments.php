<?php

namespace Holded;

use Holded\Abstracts\BaseApi;

class SendDocuments extends BaseApi
{
    public function __construct(Caller $call)
    {
        $this->call = $call;
    }

    public function send($doctype, $docid, $fields)
    {
        return $this->execute(__METHOD__, [$fields, $docid], $doctype);
    }
}