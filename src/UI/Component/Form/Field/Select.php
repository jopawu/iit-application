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
     * @var bool
     */
    protected $containsSearch = true;

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
     * @return bool
     */
    public function isContainsSearch(): bool
    {
        return $this->containsSearch;
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

    /**
     * @return Select
     */
    public function withContainsSearch() : Select
    {
        $clone = clone $this;
        $clone->containsSearch = true;
        return $clone;
    }

    /**
     * @return Select
     */
    public function withBeginsSearch() : Select
    {
        $clone = clone $this;
        $clone->containsSearch = false;
        return $clone;
    }
}
