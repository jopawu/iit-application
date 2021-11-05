<?php

namespace iit\Application\UI\Widget\TabbedPanels;

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
     * @param string $id
     * @return Bar
     */
    public function bar($id)
    {
        return new Bar($id);
    }
    /**
     * @param string $href
     * @param string $label
     * @return Tab
     */
    public function tab($href, $label)
    {
        return new Tab($href, $label);
    }
}
