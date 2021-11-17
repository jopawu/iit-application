<?php

namespace iit\Application\UI\Component\Dropdown;

use iit\Application\UI\ModuleAbstract;
use iit\Application\UI\Component\Navbar\NavAware;
use iit\Application\DI\Container;

/**
 * @author      Björn Heyser <info@bjoernheyser.de>
 */
abstract class DropdownAbstract extends ModuleAbstract implements NavAware
{
    /**
     * @var string
     */
    protected $label;

    /**
     * @var ItemAbstract[]
     */
    protected $items;

    /**
     * @param Container    $dic
     * @param string       $label
     * @param ItemAbstract $items
     */
    public function __construct(Container $dic, string $label, array $items)
    {
        parent::__construct($dic);

        $this->label = $label;
        $this->items = $items;
    }

    /**
     * @return string
     */
    public function getLabel() : string
    {
        return $this->label;
    }

    /**
     * @return ItemAbstract[]
     */
    public function getItems() : array
    {
        return $this->items;
    }

}
