<?php

namespace iit\Application\UI\Widget;

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
     * @return Menu\Factory
     */
    public function menu()
    {
        return new Menu\Factory($this->dic);
    }

    /**
     * @return Grid\Factory
     */
    public function grid()
    {
        return new Grid\Factory($this->dic);
    }
    /**
     * @return TabbedPanels\Factory
     */
    public function tabbedPanels()
    {
        return new TabbedPanels\Factory($this->dic);
    }
}
