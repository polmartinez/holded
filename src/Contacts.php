<?php

namespace Holded;
use Holded\Abstracts\BaseApi;

/**
 * Class Contacts
 * @package Holded
 *
 */
class Contacts extends BaseApi
{

    protected $methods = ['get', 'find', 'add', 'update', 'delete'];

    protected $pluralizeMethods = ['get'];

    protected $endpoint = 'contact';

    public function __construct(Caller $call)
    {
        $this->call = $call;
    }
}