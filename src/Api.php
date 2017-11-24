<?php

namespace Holded;

use Holded\Exceptions\HoldedException;

/**
 * Class Api
 * @package Holded
 *
 * @method Contacts contacts
 */
class Api
{
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

    /**
     * @param $name
     * @param $arguments
     * @return Contacts | Products | SalesChannel
     * @throws HoldedException
     */
    public function __call($name, $arguments)
    {
        $namespace = '\Holded\\' . $name;
        if (!class_exists($namespace)) {
            throw new HoldedException();
        }
        return new $namespace(new Caller($this->instanceToken));
    }
}