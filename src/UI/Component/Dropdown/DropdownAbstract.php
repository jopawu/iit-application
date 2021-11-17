<?php

namespace iit\Application\UI\Component\Dropdown;

use iit\Application\UI\ModuleAbstract;
use iit\Application\UI\Component\Navbar\NavAware;
use iit\Application\DI\Container;
use iit\Application\UI\Element\Content\Image\ImageAbstract;

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
     * @var ImageAbstract
     */
    protected $image;

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
        $this->image = null;
    }

    /**
     * @return string
     */
    public function getLabel() : string
    {
        return $this->label;
    }

    /**
     * @return bool
     */
    public function hasImage() : bool
    {
        return $this->image instanceof ImageAbstract;
    }

    /**
     * @return ImageAbstract
     */
    public function getImage() : ImageAbstract
    {
        return $this->image;
    }

    /**
     * @return ItemAbstract[]
     */
    public function getItems() : array
    {
        return $this->items;
    }

    /**
     * @param ImageAbstract $image
     * @return $this
     */
    public function withImage(ImageAbstract $image) : self
    {
        $clone = clone $this;
        $clone->image = $image;
        return $clone;
    }
}
