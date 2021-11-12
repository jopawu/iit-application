<?php

namespace iit\Application\UI\Component\Dropdown;

use iit\Application\DI\Container;
use iit\Application\UI\ModuleAbstract;
use iit\Application\UI\Component\Navbar\NavAware;

/**
 * @author      Björn Heyser <info@bjoernheyser.de>
 */
class Menu extends ModuleAbstract implements NavAware
{
    /**
     * @var string
     */
    protected $label;

    /**
     * @var Item[]
     */
    protected $items;

    /**
     * Menu constructor.
     * @param Container $dic
     * @param string    $label
     * @param array     $items
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
     * @return Item[]
     */
    public function getItems() : array
    {
        return $this->items;
    }
}
