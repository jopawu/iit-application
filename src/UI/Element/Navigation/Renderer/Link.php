<?php

namespace iit\Application\UI\Element\Navigation\Renderer;

use iit\Application\UI\RendererAbstract;
use iit\Application\UI\ModuleAbstract;
use iit\Application\UI\Element\Navigation\Link as LinkModule;

/**
 * @author      Björn Heyser <info@bjoernheyser.de>
 */
class Link extends RendererAbstract
{
    const TEMPLATE_FILE = 'UI/Element/Navigation/Link.html';

    const CSS_CLASS_ACTIVE_STATE = 'active';
    const CSS_CLASS_DISABLED_STATE = 'disabled';

    public function render(ModuleAbstract $link) : string
    {
        /* @var LinkModule $link */
        $this->assertInstanceOf($link, [LinkModule::class]);

        $template = $this->getTemplate();

        $template->assign('CLASSES', $this->getClasses($link));
        
        $template->assign('HREF', $link->getHref());
        $template->assign('LABEL', $link->getLabel());

        return $template->fetch(self::TEMPLATE_FILE);
    }

    /**
     * @return LinkModule
     */
    protected function getClasses(LinkModule $link) : string
    {
        $classes = [];

        if( $link->isActiveState() )
        {
            $classes[] = self::CSS_CLASS_ACTIVE_STATE;
        }

        if( $link->isDisabledState() )
        {
            $classes[] = self::CSS_CLASS_DISABLED_STATE;
        }

        return implode(' ', $classes);
    }
}
