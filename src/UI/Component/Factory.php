<?php

namespace iit\Application\UI\Component;

use iit\Application\DI\Container;

/**
 * @author      Björn Heyser <info@bjoernheyser.de>
 */
class Factory
{
    /**
     * @var Container
     */
    protected $dic;

    /**
     * @param Container $dic
     */
    public function __construct(Container $dic)
    {
        $this->dic = $dic;
    }

    /**
     * @return Navbar\Factory
     */
    public function navbar() : Navbar\Factory
    {
        return new Navbar\Factory($this->dic);
    }
}
