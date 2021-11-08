<?php

namespace iit\Application\UI\Component\Navbar\Renderer;

use iit\Application\UI\Renderer;
use iit\Application\UI\Module;
use iit\Application\UI\Component\Navbar\Bar as BarModule;

/**
 * @author      Björn Heyser <info@bjoernheyser.de>
 */
class Bar extends Renderer
{
    const TEMPLATE_FILE = 'UI/Component/Navbar/Bar.html';

    /**
     * @param Module $bar
     * @return string
     */
    function render(Module $bar) : string
    {
        /* @var BarModule $bar */
        $this->assertInstanceOf($bar, [BarModule::class]);

        $template = $this->getTemplate();

        return $template->fetch(self::TEMPLATE_FILE);
    }
}
