<?php

namespace iit\Application\UI\Layout\Container\Renderer;

use iit\Application\UI\Renderer;

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
        /* @var \iit\Application\UI\Layout\Container\Standard $standard */
        $this->assertInstanceOf($standard, \iit\Application\UI\Layout\Container\Standard::class);

        return '';
    }
}
