<?php

namespace iit\Application\UI\Component\Dropdown;

use iit\Application\DI\Container;
use iit\Application\UI\Element\Content\Image\ImageAbstract;

/**
 * @author      Björn Heyser <info@bjoernheyser.de>
 */
class LinkItem extends ItemAbstract
{
    /**
     * @var string
     */
    protected $label;

    /**
     * @var string
     */
    protected $href;

    /**
     * @var bool
     */
    protected $activeState;

    /**
     * @var bool
     */
    protected $disabledState;

    /**
     * @var ImageAbstract
     */
    protected $image;

    /**
     * @param Container $dic
     * @param string    $label
     * @param string    $href
     */
    public function __construct(Container $dic, string $label, string $href)
    {
        parent::__construct($dic);
        $this->label = $label;
        $this->href = $href;

        $this->activeState = false;
        $this->disabledState = false;
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
     * @return string
     */
    public function getHref() : string
    {
        return $this->href;
    }

    /**
     * @return bool
     */
    public function isActiveState() : bool
    {
        return $this->activeState;
    }

    /**
     * @return bool
     */
    public function isDisabledState() : bool
    {
        return $this->disabledState;
    }

    /**
     * @return ImageAbstract
     */
    public function getImage() : ImageAbstract
    {
        return $this->image;
    }

    /**
     * @return bool
     */
    public function hasImage() : bool
    {
        return $this->image instanceof ImageAbstract;
    }

    /**
     * @return LinkItem
     */
    public function withActiveState($activeState = true) : LinkItem
    {
        $clone = clone $this;
        $clone->activeState = $activeState;
        return $clone;
    }

    /**
     * @return LinkItem
     */
    public function withDisabledState($disabledState = true) : LinkItem
    {
        $clone = clone $this;
        $clone->disabledState = $disabledState;
        return $clone;
    }

    /**
     * @param ImageAbstract $image
     * @return LinkItem
     */
    public function withImage(ImageAbstract $image) : LinkItem
    {
        $clone = clone $this;
        $clone->image = $image;
        return $clone;
    }
}
