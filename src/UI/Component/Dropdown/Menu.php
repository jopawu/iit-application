<?php

namespace iit\Application\UI\Component\Dropdown;

use iit\Application\DI\Container;
use iit\Application\UI\ModuleAbstract;

/**
 * @author      Björn Heyser <info@bjoernheyser.de>
 */
class Menu extends ModuleAbstract
{
    /**
     * @var Item[]
     */
    protected $items;

    /**
     * @param Container $dic
     * @param Item[] $items
     */
    public function __construct(Container $dic, array $items)
    {
        parent::__construct($dic);

        $this->items = $items;
    }

    /**
     * @return Item[]
     */
    public function getItems() : array
    {
        return $this->items;
    }
}
