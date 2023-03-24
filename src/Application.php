<?php

namespace iit\Application;

use iit\Application\DI\Container;
use iit\Application\Config\Config;
use iit\Application\Http\Request;
use iit\Application\Http\Response;

/**
 * @author      Björn Heyser <info@bjoernheyser.de>
 */
abstract class Application
{
    /**
     * @var Container
     */
    protected $dic;

    /**
     * @param Config $config
     */
    public function __construct(Config $config)
    {
        $this->handleDevTime($config);

        $this->dic = Container::create($config);

        $this->dic->doc()->addJquery();
        //$this->dic->doc()->addJqueryUi();
        //$this->dic->doc()->addJsGrid();
        $this->dic->doc()->addBootstrap();
        $this->dic->doc()->addIitUiCss();
    }

    /**
     * @param Config $config
     */
    public function handleDevTime(Config $config)
    {
        $devdate = $config->getVariable('system', 'devdate');
        if( strlen($devdate) )
        {
            define('DEVDATE', $devdate);
        }
    }

    abstract public function run();
}
