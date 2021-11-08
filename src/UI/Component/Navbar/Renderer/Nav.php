<?php

namespace iit\Application\UI\Component\Navbar\Renderer;

use iit\Application\UI\Renderer;
use iit\Application\UI\Module;
use iit\Application\UI\Component\Navbar\Nav as NavModule;

/**
 * @author      Björn Heyser <info@bjoernheyser.de>
 */
class Nav extends Renderer
{
    const TEMPLATE = 'UI/Component/Navbar/Bar.html';

    /**
     * @param Module $bar
     * @return string
     */
    function render(Module $bar) : string
    {
        /* @var NavModule $bar */
        $this->assertInstanceOf($bar, [NavModule::class]);

        $template = $this->getTemplate();

        return $template->fetch(self::TEMPLATE_FILE);
    }}
