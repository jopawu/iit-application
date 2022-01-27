<?php

namespace iit\Application\UI\Component\Tabsbar;

use iit\Application\UI\ModuleAbstract;
use iit\Application\DI\Container;

/**
 * @author      Björn Heyser <info@bjoernheyser.de>
 */
class Tab extends ModuleAbstract
{
    /**
     * @var TabAware
     */
    protected $tabAware;

    /**
     * @param TabAware $tabAware
     */
    public function __construct(Container $dic, TabAware $tabAware)
    {
        parent::__construct($dic);
        $this->tabAware = $tabAware;
    }

    /**
     * @return TabAware
     */
    public function getTabAware() : TabAware
    {
        return $this->tabAware;
    }
}
