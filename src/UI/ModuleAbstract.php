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