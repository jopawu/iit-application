<?php

namespace iit\Application\UI;

class Module
{
    /**
     * @return string
     */
    protected function buildRendererClassname()
    {
        $namespacePathStack = explode("\\", get_class($this));

        $moduleClassname = array_pop($namespacePathStack);
        $moduleNamespace = implode("\\", $namespacePathStack);

        return "{$moduleNamespace}\\Renderer\\{$moduleClassname}";
    }

    /**
     * @return string
     */
    public function render()
    {
        $rendererClassname = $this->buildRendererClassname();
        $renderer = new $rendererClassname($this->dic);
        return $renderer->render($this);
    }
}