<?php

namespace iit\Application\Navigation;

use iit\Application\DI\Container;

class Resolver
{
    /**
     * @var Container
     */
    protected $dic;

    /**
     * @var System
     */
    protected $navSystem;

    /**
     * @param Container $dic
     * @param System $navSystem
     */
    public function __construct(Container $dic, System $navSystem)
    {
        $this->dic = $dic;
        $this->navSystem = $navSystem;
    }

    /**
     * @return string
     */
    public function script() : string
    {
        return $_SERVER['SCRIPT_NAME'];
    }

    /**
     * @return string|null
     */
    public function paramCtrl() : ?string
    {
        if( isset($_GET[System::PARAM_CONTROLLER]) )
        {
            return $_GET[System::PARAM_CONTROLLER];
        }

        return null;
    }

    /**
     * @return string|null
     */
    public function paramCmd() : ?string
    {
        if( isset($_GET[System::PARAM_COMMAND]) )
        {
            return $_GET[System::PARAM_COMMAND];
        }

        return null;
    }
}