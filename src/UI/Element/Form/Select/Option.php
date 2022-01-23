<?php

namespace iit\Application\UI\Element\Form\Select;

use iit\Application\Helper\DicTrait;
use iit\Application\DI\Container;
use iit\Application\UI\ModuleAbstract;

/**
 * @author      Björn Heyser <info@bjoernheyser.de>
 */
class Option extends ModuleAbstract
{
    use DicTrait;

    /**
     * @var string
     */
    protected $label;

    /**
     * @var string
     */
    protected $value;

    /**
     * @var bool
     */
    protected $selected;

    /**
     * @param Container $dic
     * @param string    $label
     * @param string    $value
     */
    public function __construct(Container $dic, string $label, string $value)
    {
        parent::__construct($dic);
        $this->label = $label;
        $this->value = $value;
        $this->selected = false;
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
    public function getValue() : string
    {
        return $this->value;
    }

    /**
     * @return bool
     */
    public function isSelected() : bool
    {
        return $this->selected;
    }

    /**
     * @param bool $selected
     * @return Option
     */
    public function withSelected(bool $selected) : Option
    {
        $clone = clone $this;
        $clone->selected = $selected;
        return $clone;
    }

}
