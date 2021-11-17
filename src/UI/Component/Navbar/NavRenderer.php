<?php

namespace iit\Application\UI\Component\Navbar;

use iit\Application\UI\RendererAbstract;
use iit\Application\UI\ModuleAbstract;

/**
 * @author      Björn Heyser <info@bjoernheyser.de>
 */
class NavRenderer extends RendererAbstract
{
    const TEMPLATE_FILE = 'UI/Component/Navbar/Nav.html';

    /**
     * @param ModuleAbstract $nav
     * @return string
     */
    function render(ModuleAbstract $nav) : string
    {
        /* @var Nav $nav */
        $this->assertInstanceOf($nav, [Nav::class]);

        $template = $this->getTemplate();

        $template->assign('NAV_AWARE', $nav->getNavAware()->render());

        return $template->fetch(self::TEMPLATE_FILE);
    }}
