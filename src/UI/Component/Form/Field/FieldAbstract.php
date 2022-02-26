<?php

namespace iit\Application\UI\Component\Form\Field;

use iit\Application\UI\ModuleAbstract;
use iit\Application\DI\Container;

/**
 * @author      Björn Heyser <info@bjoernheyser.de>
 */
abstract class FieldAbstract extends ModuleAbstract
{
    /**
     * @var string
     */
    protected $id;

    /**
     * @var string
     */
    protected $name;

    /**
     * @var string
     */
    protected $label;

    /**
     * @var string
     */
    protected $prefix;

    /**
     * @var string
     */
    protected $suffix;

    /**
     * @var int
     */
    protected $gridWidth;

    /**
     * @var string[]
     */
    protected $cssClasses;

    /**
     * @param Container $dic
     * @param string    $id
     * @param string    $name
     * @param string    $label
     */
    public function __construct(Container $dic, string $id, string $name, string $label)
    {
        parent::__construct($dic);
        $this->id = $id;
        $this->name = $name;
        $this->label = $label;
        $this->gridWidth = 12;
        $this->cssClasses = [];
    }

    /**
     * @return string
     */
    public function getId() : string
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getName() : string
    {
        return $this->name;
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
    public function getPrefix() : string
    {
        return $this->prefix;
    }

    /**
     * @param string $prefix
     * @return $this
     */
    public function withPrefix(string $prefix)
    {
        $clone = clone $this;
        $clone->prefix = $prefix;
        return $clone;
    }

    /**
     * @return string
     */
    public function getSuffix() : string
    {
        return $this->suffix;
    }

    /**
     * @param string $suffix
     * @return $this
     */
    public function withSuffix(string $suffix)
    {
        $clone = clone $this;
        $clone->suffix = $suffix;
        return $clone;
    }

    /**
     * @return int
     */
    public function getGridWidth() : int
    {
        return $this->gridWidth;
    }

    /**
     * @param int $gridWidth
     */
    public function withGridWidth(int $gridWidth) : FieldAbstract
    {
        $clone = clone $this;
        $clone->gridWidth = $gridWidth;
        return $clone;
    }

    /**
     * @return string[]
     */
    public function getCssClasses() : array
    {
        return $this->cssClasses;
    }

    /**
     * @param string $cssClass
     */
    public function withAddedCssClass(string $cssClass) : FieldAbstract
    {
        $clone = clone $this;
        $clone->cssClasses[] = $cssClass;
        return $clone;
    }
}
