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
     * @param string $label
     * @param string $href
     * @return LinkItem
     */
    public function link(string $label, string $href) : LinkItem
    {
        return new LinkItem($this->dic, $label, $href);
    }

    /**
     * @return DividerItem
     */
    public function divider() : DividerItem
    {
        return new DividerItem($this->dic);
    }
}
