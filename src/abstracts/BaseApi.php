<?php

namespace Holded\Abstracts;

use Holded\Exceptions\HoldedException;
use Holded\Interfaces\ApiInterface;

abstract class BaseApi implements ApiInterface
{
    private $endpoint;
    private $baseUrl = 'https://app.holded.com/api/v1/';

    /** @var string The API access token */
    private static $token = null;

    /** @var string The instance token, settable once per new instance */
    private $instanceToken;

    /**
     * @param string|null $token The API access token, as obtained on diffbot.com/dev
     * @throws HoldedException When no token is provided
     */
    public function __construct($token = null)
    {
        if ($token === null) {
            if (self::$token === null) {
                $msg = 'No token provided, and none is globally set. ';
                $msg .= 'Use Diffbot::setToken, or instantiate the Diffbot class with a $token parameter.';
                throw new HoldedException($msg);
            }
        } else {
            self::validateToken($token);
            $this->instanceToken = $token;
        }
    }

    /**
     * Sets the token for all future new instances
     * @param $token string The API access token, as obtained on diffbot.com/dev
     * @return void
     */
    public static function setToken($token)
    {
        self::validateToken($token);
        self::$token = $token;
    }

    private static function validateToken($token)
    {
        if (!is_string($token)) {
            throw new \InvalidArgumentException('Token is not a string.');
        }
        if (strlen($token) < 4) {
            throw new \InvalidArgumentException('Token "' . $token . '" is too short, and thus invalid.');
        }
        return true;
    }

    public function getEndpoint(): string
    {
        return $this->endpoint;
    }

    public function setEndpoint($endpoint)
    {
        $this->endpoint = $endpoint;
    }

    public function get()
    {
        $this->setEndpoint($this->endpoint . 's');
        return $this->call(__METHOD__);
    }

    public function find($params)
    {
        return $this->call(__METHOD__, $params);
    }

    public function add($params)
    {
        return $this->call(__METHOD__, $params);
    }

    public function update($id, $params)
    {
        return $this->call(__METHOD__, $params, $id);
    }

    public function delete($id, $params)
    {
        return $this->call(__METHOD__, $params, $id);
    }

    public function call(string $method, array $params = [], string $id = '')
    {
        $params = array_merge(['key' => $this->instanceToken], $params);
        $url = $this->baseUrl . $method . '/' . $this->endpoint . '/' . $id;

        $adb_handle = curl_init();
        $options = [
            CURLOPT_HEADER => false,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_URL => $url,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => $params,
            CURLOPT_SSL_VERIFYPEER => false,
            CURLOPT_VERBOSE => true
        ];
        curl_setopt_array($adb_handle, $options);
        return json_decode(curl_exec($adb_handle), true);
    }

}