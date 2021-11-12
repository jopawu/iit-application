<?php

namespace iit\Application\UI\Element\Navigation;

use iit\Application\UI\RendererAbstract;
use iit\Application\UI\ModuleAbstract;
use iit\Application\UI\Constants;

/**
 * @author      Björn Heyser <info@bjoernheyser.de>
 */
class LinkRenderer extends RendererAbstract
{
    const TEMPLATE_FILE = 'UI/Element/Navigation/Link.html';

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
     * @param Link $link
     * @return string
     */
    protected function getClasses(Link $link) : string
    {
        $classes = [];

        if( $link->isActiveState() )
        {
            $classes[] = Constants::BS_CLASS_ACTIVE;
        }

        if( $link->isDisabledState() )
        {
            $classes[] = Constants::BS_CLASS_DISABLED;
        }

        return implode(' ', $classes);
    }
}
