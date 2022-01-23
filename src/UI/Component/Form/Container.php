<?php

namespace iit\Application\UI\Component\Form;

use iit\Application\UI\ModuleAbstract;
use iit\Application\DI\Container as DiContainer;

/**
 * @author      Björn Heyser <info@bjoernheyser.de>
 */
class Container extends ModuleAbstract
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
    protected $action;

    /**
     * @var string
     */
    protected $label;

    /**
     * @var Fieldset[]
     */
    protected $fieldsets;

    /**
     * @var Submit[]
     */
    protected $submits;

    /**
     * @param DiContainer $dic
     * @param string    $id
     * @param string    $name
     * @param string    $action
     * @param string    $label
     */
    public function __construct(DiContainer $dic, string $id, string $name, string $action, string $label)
    {
        parent::__construct($dic);
        $this->id = $id;
        $this->name = $name;
        $this->action = $action;
        $this->label = $label;
        $this->fieldsets = [];
        $this->submits = [];
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
    public function getAction() : string
    {
        return $this->action;
    }

    /**
     * @return string
     */
    public function getLabel() : string
    {
        return $this->label;
    }

    /**
     * @return FieldSet[]
     */
    public function getFieldsets() : array
    {
        return $this->fieldsets;
    }

    /**
     * @param Fieldset $fieldset
     * @return Container
     */
    public function withAddedFieldset(Fieldset $fieldset) : Container
    {
        $clone = clone $this;
        $clone->fieldsets[] = $fieldset;
        return $clone;
    }

    /**
     * @return Submit[]
     */
    public function getSubmits() : array
    {
        return $this->submits;
    }

    /**
     * @param Submit $submit
     */
    public function withAddedSubmit(Submit $submit) : Container
    {
        $clone = clone $this;
        $clone->submits[] = $submit;
        return $clone;
    }


}
