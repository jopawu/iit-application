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
     * @var int
     */
    protected $gridWidth;

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
}
