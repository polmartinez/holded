<?php

namespace Holded;

class SalesChannel extends Api
{
    public function __construct($key)
    {
        $this->setEndpoint('saleschannel');
        parent::__construct($key);
    }
}