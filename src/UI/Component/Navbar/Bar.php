<?php

namespace iit\Application\UI\Component\Navbar;

use iit\Application\UI\ModuleAbstract;
use iit\Application\DI\Container;

/**
 * @author      Björn Heyser <info@bjoernheyser.de>
 */
class Bar extends ModuleAbstract
{
    /**
     * @var Nav[]
     */
    protected $navs;

    /**
     * @param Container $dic
     * @param Nav[]     $navs
     */
    public function __construct(Container $dic, array $navs)
    {
        parent::__construct($dic);
        $this->navs = $navs;
    }

    /**
     * @return Nav[]
     */
    public function getNavs() : array
    {
        return $this->navs;
    }
}
