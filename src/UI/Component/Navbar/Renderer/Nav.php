<?php

namespace iit\Application\UI\Component\Navbar\Renderer;

use iit\Application\UI\RendererAbstract;
use iit\Application\UI\ModuleAbstract;
use iit\Application\UI\Component\Navbar\Nav as NavModule;

/**
 * @author      Björn Heyser <info@bjoernheyser.de>
 */
class Nav extends RendererAbstract
{
    const TEMPLATE_FILE = 'UI/Component/Navbar/Nav.html';

    /**
     * @param ModuleAbstract $bar
     * @return string
     */
    function render(ModuleAbstract $nav) : string
    {
        /* @var NavModule $nav */
        $this->assertInstanceOf($nav, [NavModule::class]);

        $template = $this->getTemplate();

        $template->assign('NAV_AWARE', $nav->getNavAware()->render());

        return $template->fetch(self::TEMPLATE_FILE);
    }}
