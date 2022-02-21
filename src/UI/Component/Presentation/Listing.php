<?php

namespace iit\Application\UI\Component\Presentation;

use iit\Application\UI\ModuleAbstract;
use iit\Application\Helper\DicTrait;
use iit\Application\DI\Container;
use iit\Application\UI\Component\Form\SectionAware;

/**
 * @author      Björn Heyser <info@bjoernheyser.de>
 */
class Listing extends ModuleAbstract implements SectionAware
{
    use DicTrait;

    /**
     * @var Item[]
     */
    protected $items;

    /**
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
