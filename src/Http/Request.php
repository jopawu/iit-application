<?php

namespace iit\Application\Http;

use GuzzleHttp\Psr7\ServerRequest as ServerRequest;

/**
 * @author      Björn Heyser <info@bjoernheyser.de>
 */
class Request
{
    /**
     * @var ServerRequest
     */
    protected $serverRequest;

    /**
     * @var array
     */
    protected $parameters;

    public function __construct()
    {
        $this->serverRequest = ServerRequest::fromGlobals();
        $this->parameters = array_merge_recursive($_GET, $_POST);
    }

    /**
     * @param string $parameterName
     * @return bool
     */
    public function paramExists(string $parameterName) : bool
    {
        return isset($this->parameters[$parameterName]);
    }

    /**
     * @param string $parameterName
     * @return string
     */
    public function param(string $parameterName) : ?string
    {
        if( !$this->paramExists($parameterName) )
        {
            return null;
        }

        return $this->parameters[$parameterName];
    }
}
