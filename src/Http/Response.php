<?php

namespace iit\Application\Http;

use GuzzleHttp\Psr7\Response as ServerResponse;
use GuzzleHttp\Psr7\StreamWrapper;
use GuzzleHttp\Psr7\Stream;

/**
 * @author      Björn Heyser <info@bjoernheyser.de>
 */
class Response
{
    /**
     * @var ServerResponse
     */
    protected $serverResponse;

    public function __construct()
    {
        $this->serverResponse = new ServerResponse();
    }

    /**
     * @param string $headerName
     * @param string $headerValue
     */
    public function addHeader($headerName, $headerValue)
    {
        $this->serverResponse = $this->serverResponse->withAddedHeader(
            $headerName, $headerValue
        );
    }

    /**
     * @param string $body
     */
    public function setBody($body)
    {
        $this->serverResponse = $this->serverResponse->withBody($body);
    }
}
