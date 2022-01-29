<?php

namespace iit\Application\UI\Component\Tabs;

use iit\Application\UI\ModuleAbstract;
use iit\Application\DI\Container;
use iit\Application\UI\Layout\Panel\Secondary;

/**
 * @author      Björn Heyser <info@bjoernheyser.de>
 */
class Bar extends ModuleAbstract
{
    /**
     * @var Tab[]
     */
    protected $tabs;

    /**
     * @var Secondary
     */
    protected $panel;

    /**
     * @param Container $dic
     * @param Tab[]     $tabs
     */
    public function __construct(Container $dic, array $tabs)
    {
        $this->assertInstancesOf($tabs, [Tab::class]);

        parent::__construct($dic);

        $this->tabs = $tabs;
        $this->panel = $dic->ui()->layout()->panel()->secondary('');
    }

    /**
     * @return Tab[]
     */
    public function getTabs() : array
    {
        return $this->tabs;
    }

    /**
     * @return Secondary
     */
    public function getPanel() : Secondary
    {
        return $this->panel;
    }

    /**
     * @param Secondary $panel
     * @return Bar
     */
    public function withPanel(Secondary $panel) : Bar
    {
        $clone = clone $this;
        $clone->panel = $panel;
        return $clone;
    }
}
