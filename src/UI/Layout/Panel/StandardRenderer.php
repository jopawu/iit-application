<?php

namespace iit\Application\UI\Layout\Panel;

use iit\Application\UI\RendererAbstract;
use iit\Application\UI\ModuleAbstract;
use iit\Application\UI\Layout\Panel\Standard;

/**
 * @author      Björn Heyser <info@bjoernheyser.de>
 */
class StandardRenderer extends RendererAbstract
{
    /**
     * @param ModuleAbstract $standard
     * @return string
     */
    public function render(ModuleAbstract $standard) : string
    {
        /* @var Standard $standard */
        $this->assertInstanceOf($standard, [Standard::class]);

        return '';
    }
}
