<?php

namespace iit\Application\UI\Layout\Panel\Renderer;

use iit\Application\UI\Renderer;
use iit\Application\UI\Layout\Container\Standard as StandardModule;

/**
 * @author      Björn Heyser <info@bjoernheyser.de>
 */
class Standard extends Renderer
{
    /**
     * @param Module $standard
     * @return string
     */
    public function render(Module $standard) : string
    {
        /* @var StandardModule $standard */
        $this->assertInstanceOf($standard, StandardModule::class);

        return '';
    }
}
