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
     * @var string
     */
    protected $title;

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
        $this->title = '';
        $this->items = $items;
    }

    /**
     * @return string
     */
    public function getTitle() : string
    {
        return $this->title;
    }

    /**
     * @return Item[]
     */
    public function getItems() : array
    {
        return $this->items;
    }

    /**
     * @param string $title
     * @return Listing
     */
    public function withTitle(string $title) : Listing
    {
        $clone = clone $this;
        $clone->title = $title;
        return $clone;
    }
}
