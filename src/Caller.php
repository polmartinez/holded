<?php

namespace Holded;

use GuzzleHttp\Client;

class Caller
{
    private $baseUrl = 'https://app.holded.com/api/v1';

    protected $token;

    private $endpoint;

    private $method;

    private $client;

    public function __construct($token = '')
    {
        $this->client = new Client();
        $this->token = $token;
    }

    public function getEndpoint(): string
    {
        return $this->endpoint;
    }

    public function setEndpoint(string $endpoint, $pluralize = false)
    {
        $this->endpoint = $endpoint . ($pluralize ? 's' : '');
    }

    public function setMethod(string $method)
    {
        $values = explode('::', $method);
        $this->method = $values[count($values) - 1];
    }

    public function getMethod()
    {
        return $this->method;
    }

    public function getUrl(string $id = '')
    {
        $url = [
            $this->baseUrl, $this->method, $this->endpoint, $id
        ];
        return implode('/', array_filter($url));
    }

    public function call(array $params = [], string $id = '')
    {
        $params = array_merge(['key' => $this->token], $params);

        if (array_key_exists('items', $params)) {
            $params['items'] = json_encode($params['items']);
        }

        $response = $this->client
            ->post($this->getUrl($id), ['body' => $params])
            ->getBody();
        return json_decode($response, true);
    }
}