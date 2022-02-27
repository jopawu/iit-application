<?php

namespace iit\Application\UI;

use iit\Application\Helper\DicTrait;

class ModuleAbstract implements ModuleAware
{
    use DicTrait;
    use Assertion;

    /**
     * @var string[]
     */
    protected $cssClasses = [];

    /**
     * @var array
     */
    protected $attributes = [];

    /**
     * @return string[]
     */
    public function getCssClasses() : array
    {
        return $this->cssClasses;
    }

    /**
     * @param string $cssClass
     * @return static
     */
    public function withCssClassAdded(string $cssClass)
    {
        $clone = clone $this;
        $clone->cssClasses[] = $cssClass;
        return $clone;
    }

    /**
     * @param string[] $cssClasses
     * @return static
     */
    public function withCssClassesAdded(array $cssClasses)
    {
        $clone = clone $this;
        $clone->cssClasses = array_merge($clone->cssClasses, $cssClasses);
        return $clone;
    }

    /**
     * @return array
     */
    public function getAttributes() : array
    {
        return $this->attributes;
    }

    /**
     * @param string $name
     * @param string $value
     * @return static
     */
    public function withAttributeAdded(string $name, string $value)
    {
        $clone = clone $this;
        $clone->attributes[$name] = $value;
        return $clone;
    }

    /**
     * @return string
     */
    protected function buildRendererClassname() : string
    {
        $namespacedClassname = get_class($this);
        return "{$namespacedClassname}Renderer";
    }

    /**
     * @return string
     */
    public function render() : string
    {
        $rendererClassname = $this->buildRendererClassname();
        $renderer = new $rendererClassname($this->dic);
        return $renderer->render($this);
    }
}