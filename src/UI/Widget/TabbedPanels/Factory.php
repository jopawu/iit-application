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
     * @return TabsBar
     */
    public function bar($id)
    {
        return new TabsBar($id);
    }
    /**
     * @param string $href
     * @param string $label
     * @return TabPanel
     */
    public function tab($href, $label)
    {
        return new TabPanel($href, $label);
    }
}
