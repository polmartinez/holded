<?php

namespace Holded;
/**
 * Class Contacts
 * @package Holded
 *
 * Contacts->get()
 */
class Contacts extends Api
{
    public function __construct()
    {
        $this->setEndpoint('contact');
        parent::__construct();
    }
}