<?php

namespace iit\Application;

use iit\Application\DI\Container;
use iit\Application\Config\Config;
use iit\Application\Http\Request;
use iit\Application\Http\Response;

/**
 * @author      Björn Heyser <info@bjoernheyser.de>
 */
class Application
{
    /**
     * @var Container
     */
    protected $dic;

    /**
     * @param Config $config
     */
    final public function __construct(Config $config)
    {
        $this->dic = Container::create();
    }

    abstract public function run();
}
