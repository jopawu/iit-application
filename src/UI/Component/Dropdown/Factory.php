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
     * @param ItemAbstract[] $items
     * @return ButtonMenu
     */
    public function buttonMenu(string $label, array $items) : ButtonMenu
    {
        return new ButtonMenu($this->dic, $label, $items);
    }

    /**
     * @param string $label
     * @param ItemAbstract[] $items
     * @return LinkMenu
     */
    public function linkMenu(string $label, array $items) : LinkMenu
    {
        return new LinkMenu($this->dic, $label, $items);
    }

    /**
     * @param string $label
     * @param Item[] $items
     * @return ButtonSplit
     */
    public function buttonSplit(string $label, array $items) : ButtonSplit
    {
        return new ButtonSplit($this->dic, $label, $items);
    }

    /**
     * @param string $label
     * @param Item[] $items
     * @return LinkSplit
     */
    public function linkSplit(string $label, array $items) : LinkSplit
    {
        return new LinkSplit($this->dic, $label, $items);
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
