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

    public function __construct()
    {
        $this->serverRequest = ServerRequest::fromGlobals();
    }
}
