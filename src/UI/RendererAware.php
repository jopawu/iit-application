<?php

namespace iit\Application\UI;

interface RendererAware
{
    /**
     * @param ModuleAbstract $module
     * @return string
     */
    public function render(ModuleAbstract $module) : string;

}