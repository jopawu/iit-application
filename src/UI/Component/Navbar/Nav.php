<?php

namespace iit\Application\UI\Component\Navbar;

use iit\Application\UI\ModuleAbstract;
use iit\Application\DI\Container;

/**
 * @author      Björn Heyser <info@bjoernheyser.de>
 */
class Nav extends ModuleAbstract
{
    /**
     * @var NavAware
     */
    protected $navAware;

    /**
     * @param NavAware $navAware
     */
    public function __construct(Container $dic, NavAware $navAware)
    {
        parent::__construct($dic);
        $this->navAware = $navAware;
    }

    /**
     * @return NavAware
     */
    public function getNavAware() : NavAware
    {
        return $this->navAware;
    }
}
