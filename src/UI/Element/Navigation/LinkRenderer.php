<?php

namespace iit\Application\UI\Element\Navigation;

use iit\Application\UI\RendererAbstract;
use iit\Application\UI\ModuleAbstract;

/**
 * @author      Björn Heyser <info@bjoernheyser.de>
 */
class LinkRenderer extends RendererAbstract
{
    const TEMPLATE_FILE = 'UI/Element/Navigation/Link.html';

    const CSS_CLASS_ACTIVE_STATE = 'active';
    const CSS_CLASS_DISABLED_STATE = 'disabled';

    public function render(ModuleAbstract $link) : string
    {
        /* @var Link $link */
        $this->assertInstanceOf($link, [Link::class]);

        $template = $this->getTemplate();

        $template->assign('CLASSES', $this->getClasses($link));
        
        $template->assign('HREF', $link->getHref());
        $template->assign('LABEL', $link->getLabel());

        return $template->fetch(self::TEMPLATE_FILE);
    }

    /**
     * @return Link
     */
    protected function getClasses(Link $link) : string
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
