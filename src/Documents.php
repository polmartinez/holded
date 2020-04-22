<?php

namespace Holded;
use Holded\Abstracts\BaseApi;

/**
 * Class Contacts
 * @package Holded
 *
 */
class Documents extends BaseApi
{

    protected $methods = ['get', 'find', 'add', 'update', 'delete'];

    protected $pluralizeMethods = ['get', 'add'];

    protected $endpoint = 'document';

    public function __construct(Caller $call)
    {
        $this->call = $call;
    }
}