<?php

namespace iit\Application\UI\Component\Form;

use iit\Application\DI\Container;
use iit\Application\UI\ModuleAbstract;
use iit\Application\UI\Component\Form\Field\FieldAbstract;

/**
 * @author      Björn Heyser <info@bjoernheyser.de>
 */
class Fieldset extends ModuleAbstract
{
    /**
     * @var string
     */
    protected $label;

    /**
     * @var FieldAbstract[]
     */
    protected $fields;

    /**
     * @param string $label
     */
    public function __construct(Container $dic, string $label)
    {
        parent::__construct($dic);
        $this->label = $label;
        $this->fields = [];
    }

    /**
     * @return string
     */
    public function getLabel() : string
    {
        return $this->label;
    }

    /**
     * @return FieldAbstract[]
     */
    public function getFields() : array
    {
        return $this->fields;
    }

    /**
     * @param FieldAbstract[] $fields
     * @return FieldSet
     */
    public function withFields(array $fields) : FieldSet
    {
        $clone = clone $this;
        $clone->fields = $fields;
        return $clone;
    }
}
