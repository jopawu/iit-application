<?php

namespace iit\Application\Http;

use GuzzleHttp\Psr7\Response as ServerResponse;
use GuzzleHttp\Psr7\BufferStream;

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
        $this->serverResponse->withBody(new BufferStream());
    }

    /**
     * @param string $headerName
     * @param string $headerValue
     */
    public function addHeader($headerName, $headerValue)
    {
        $this->serverResponse = $this->serverResponse->withHeader(
            $headerName, $headerValue
        );
    }

    /**
     * @param string $body
     */
    public function addBody($body)
    {
        $this->serverResponse->getBody()->write($body);
    }

    public function flush()
    {
        http_response_code($this->serverResponse->getStatusCode());

        foreach($this->serverResponse->getHeaders() as $name => $values)
        {
            foreach ($values as $value)
            {
                header("{$name}:{$value}");
            }
        }

        echo $this->serverResponse->getBody();
    }
}
