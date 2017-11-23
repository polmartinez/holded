<?php

namespace Holded\Interfaces;

interface ApiInterface
{

    public function getEndpoint(): string;

    public function setEndpoint($endpoint);

    public function get();

    public function find($params);

    public function add($params);

    public function update($id, $params);

    public function delete($id, $params);
}