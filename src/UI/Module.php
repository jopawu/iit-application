<?php

namespace iit\Application\UI;

class Module
{
    /**
     * @param Module $module
     * @return string
     */
    public function render(Module $module)
    {
        $rendererClassname = get_class($module).'Renderer';

        $renderer = new $rendererClassname($this->dic);
        return $renderer->render($this);
    }
}