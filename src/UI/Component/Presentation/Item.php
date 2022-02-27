<?php

namespace iit\Application\UI\Component\Presentation;

use iit\Application\Helper\DicTrait;
use iit\Application\UI\ModuleAbstract;
use iit\Application\DI\Container;

/**
 * @author      Björn Heyser <info@bjoernheyser.de>
 */
class Item extends ModuleAbstract
{
    use DicTrait;

    /**
     * @var string
     */
    protected $title;

    /**
     * @var string
     */
    protected $description;

    /**
     * @var array
     */
    protected $properties;

    /**
     * @var string[]
     */
    protected $contents;

    /**
     * @var string
     */
    protected $leadingContent;

    /**
     * @var string
     */
    protected $trailingContent;

    /**
     * @var bool
     */
    protected $largeSurroundingContent;

    /**
     * @param string $title
     */
    public function __construct(Container $dic, string $title)
    {
        parent::__construct($dic);
        $this->title = $title;
        $this->description = '';
        $this->properties = [];
        $this->contents = [];
        $this->leadingContent = '';
        $this->trailingContent = '';
        $this->largeSurroundingContent = false;
    }

    /**
     * @return string
     */
    public function getTitle() : string
    {
        return $this->title;
    }

    /**
     * @return string
     */
    public function getDescription() : string
    {
        return $this->description;
    }

    /**
     * @return array
     */
    public function getProperties() : array
    {
        return $this->properties;
    }

    /**
     * @return string[]
     */
    public function getContents() : array
    {
        return $this->contents;
    }

    /**
     * @return bool
     */
    public function hasContents() : bool
    {
        return count($this->contents);
    }

    /**
     * @return string
     */
    public function getLeadingContent() : string
    {
        return $this->leadingContent;
    }

    /**
     * @return bool
     */
    public function hasLeadingContent() : bool
    {
        return strlen($this->leadingContent);
    }

    /**
     * @return string
     */
    public function getTrailingContent() : string
    {
        return $this->trailingContent;
    }

    /**
     * @return bool
     */
    public function hasTrailingContent() : bool
    {
        return strlen($this->trailingContent);
    }

    /**
     * @return bool
     */
    public function isLargeSurroundingContent() : bool
    {
        return $this->largeSurroundingContent;
    }

    /**
     * @param string $description
     * @return Item
     */
    public function withDescription(string $description) : Item
    {
        $clone = clone $this;
        $clone->description = $description;
        return $clone;
    }

    /**
     * @param string $name
     * @param string $value
     * @return Item
     */
    public function withPropertyAdded(string $name, string $value) : Item
    {
        $clone = clone $this;
        $clone->properties[$name] = $value;
        return $clone;
    }

    /**
     * @param string $content
     * @return Item
     */
    public function withContentAdded(string $content) : Item
    {
        $clone = clone $this;
        $clone->contents[] = $content;
        return $clone;
    }

    /**
     * @param string $leadingContent
     * @return Item
     */
    public function withLeadingContent(string $leadingContent) : Item
    {
        $clone = clone $this;
        $clone->leadingContent = $leadingContent;
        return $clone;
    }

    /**
     * @param string $trailingContent
     * @return Item
     */
    public function withTrailingContent(string $trailingContent) : Item
    {
        $clone = clone $this;
        $clone->trailingContent = $trailingContent;
        return $clone;
    }

    /**
     * @param bool $largeSurroundingContent
     * @return Item
     */
    public function withLargeSurroundingContent(bool $largeSurroundingContent = true) : Item
    {
        $clone = clone $this;
        $clone->largeSurroundingContent = $largeSurroundingContent;
        return $clone;
    }
}
