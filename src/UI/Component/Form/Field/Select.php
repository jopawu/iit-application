<?php

namespace iit\Application\UI\Component\Form\Field;

use iit\Application\UI\Element\Form\Select\Option;

/**
 * @author      Björn Heyser <info@bjoernheyser.de>
 */
class Select extends FieldAbstract
{
    /**
     * @var Option[]
     */
    protected $options = [];

    /**
     * @var bool
     */
    protected $searchEnabled = false;

    /**
     * @return Option[]
     */
    public function getOptions() : array
    {
        return $this->options;
    }

    /**
     * @return bool
     */
    public function isSearchEnabled(): bool
    {
        return $this->searchEnabled;
    }

    /**
     * @param string $label
     * @param string $value
     * @param bool   $selected
     * @return Select
     */
    public function withOptionAdded(string $label, string $value, bool $selected = false) : Select
    {
        $clone = clone $this;

        $clone->options[] = $this->dic->ui()->element()->form()->select()->option($label, $value)
                                                                        ->withSelected($selected);
        return $clone;
    }

    /**
     * @return Select
     */
    public function withSearchEnabled() : Select
    {
        $clone = clone $this;
        $clone->searchEnabled = true;
        return $clone;
    }

    /**
     * @return Select
     */
    public function withSearchDisabled() : Select
    {
        $clone = clone $this;
        $clone->searchEnabled = false;
        return $clone;
    }
}
