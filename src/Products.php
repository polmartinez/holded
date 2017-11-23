<?php
/**
 * Created by PhpStorm.
 * User: enricu
 * Date: 22/11/2017
 * Time: 21:12
 */

namespace Holded;


class Products extends Api
{
    public function __construct()
    {
        $this->setEndpoint('product');
        parent::__construct();
    }
}