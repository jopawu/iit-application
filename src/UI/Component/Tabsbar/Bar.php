<?php

namespace iit\Application\UI\Component\Tabsbar;

use iit\Application\UI\ModuleAbstract;
use iit\Application\DI\Container;

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
     * @param Container $dic
     * @param Tab[]     $tabs
     */
    public function __construct(Container $dic, array $tabs)
    {
        $this->assertInstancesOf($tabs, [Tab::class]);

        parent::__construct($dic);
        $this->tabs = $tabs;
    }

    /**
     * @return Tab[]
     */
    public function getTabs() : array
    {
        return $this->tabs;
    }
}
