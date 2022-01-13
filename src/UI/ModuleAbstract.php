<?php

namespace iit\Application\UI;

use iit\Application\Helper\DicTrait;

class ModuleAbstract implements ModuleAware
{
    use DicTrait;
    use Assertion;

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