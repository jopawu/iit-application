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
     * @return Dropdown\Factory
     */
    public function dropdown() : Dropdown\Factory
    {
        return new Dropdown\Factory($this->dic);
    }

    /**
     * @return Navbar\Factory
     */
    public function navbar() : Navbar\Factory
    {
        return new Navbar\Factory($this->dic);
    }
}
