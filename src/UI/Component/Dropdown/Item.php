<?php

namespace iit\Application\UI\Component\Dropdown;

use iit\Application\UI\ModuleAbstract;
use iit\Application\DI\Container;

/**
 * @author      Björn Heyser <info@bjoernheyser.de>
 */
class Item extends ModuleAbstract
{
    /**
     * @var ItemAware
     */
    protected $itemAware;

    /**
     * @param Container $dic
     * @param ItemAware $itemAware
     */
    public function __construct(Container $dic, ItemAware $itemAware)
    {
        parent::__construct($dic);
        $this->itemAware = $itemAware;
    }

    /**
     * @return ItemAware
     */
    public function getItemAware() : ItemAware
    {
        return $this->itemAware;
    }
}
