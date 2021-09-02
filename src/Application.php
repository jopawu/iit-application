<?php

namespace iit\Application;

use iit\Application\Http\Request;
use iit\Application\Http\Response;
use iit\Application\Config\Config;

/**
 * @author      Björn Heyser <info@bjoernheyser.de>
 */
class Application
{
    /**
     * @var Request
     */
    protected $request;

    /**
     * @var Response
     */
    protected $response;

    /**
     * @var Config
     */
    protected $config;

    final public function __construct(Config $config)
    {
        $this->request = Request::fromGlobals();
        $this->response = new Response();

        $this->config = $config;
    }

    abstract public function run();
}
