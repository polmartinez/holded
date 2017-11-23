<?php

namespace Holded\Doc;

class SalesOrder
{
    public function __construct()
    {
        $this->setEndpoint('product');
        parent::__construct();
    }
}