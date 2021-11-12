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
     * @param string $label
     * @param Item[] $items
     * @return Menu
     */
    public function menu(string $label, array $items) : Menu
    {
        return new Menu($this->dic, $label, $items);
    }

    /**
     * @param ItemAware $itemAware
     * @return Item
     */
    public function item(ItemAware $itemAware) : Item
    {
        return new Item($this->dic, $itemAware);
    }
}
