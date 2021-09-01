<?php

/* Copyright (c) 1998-2019 ILIAS open source, Extended GPL, see docs/LICENSE */

namespace iit\Application;

use iit\Application\Http\Request;
use iit\Application\Http\Response;

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

    public function __construct()
    {
        $this->request = Request::fromGlobals();
        $this->response = new Response();
    }

    abstract public function run();
}
