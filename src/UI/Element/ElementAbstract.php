<?php

namespace iit\Application\UI\Element;

use iit\Application\UI\ModuleAbstract;

/**
 * @author      Björn Heyser <info@bjoernheyser.de>
 */
class ElementAbstract extends ModuleAbstract
{
    /**
     * @var array
     */
    protected $classes = [];

    /**
     * @var array
     */
    protected $attributes = [];

    /**
     * @param string $class
     * @return $this
     */
    public function withClassAdded(string $class) : self
    {
        $clone = clone $this;
        $clone->classes[] = $class;
        return $clone;
    }

    /**
     * @return string
     */
    public function getRenderedClasses() : string
    {
        return implode(' ', $this->classes);
    }

    /**
     * @param string $name
     * @param string $value
     * @return $this
     */
    public function withAttributeAdded(string $name, string $value) : self
    {
        $clone = clone $this;
        $clone->attributes[$name] = $value;
        return $clone;
    }

    /**
     * @return string
     */
    public function getRenderedAttributes() : string
    {
        $attributes = [];

        foreach($this->attributes as $name => $value)
        {
            $attributes[] = $name.'="'.$value.'"';
        }

        return implode(' ', $attributes);
    }
}
