<?php

namespace iit\Application\UI\Component\Dropdown;

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
     * @param Nav[]
     * @return Bar
     */
    public function bar(array $navs) : Bar
    {
        return new Bar($this->dic, $navs);
    }

    /**
     * @param NavAware
     * @return Bar
     */
    public function nav(NavAware $navAware) : Nav
    {
        return new Nav($this->dic, $navAware);
    }
}
