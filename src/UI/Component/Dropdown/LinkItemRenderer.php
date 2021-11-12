<?php

namespace iit\Application\UI\Component\Dropdown;

use iit\Application\UI\RendererAbstract;
use iit\Application\UI\ModuleAbstract;
use iit\Application\UI\Constants;

/**
 * @author      Björn Heyser <info@bjoernheyser.de>
 */
class LinkItemRenderer extends RendererAbstract
{
    const TEMPLATE_FILE = 'UI/Component/Dropdown/LinkItem.html';
    
    /**
     * @param ModuleAbstract $item
     * @return string
     */
    public function render(ModuleAbstract $item) : string
    {
        /* @var Item $item */
        $this->assertInstanceOf($item, [LinkItem::class]);
        
        $template = $this->getTemplate();

        $template->assign('CLASSES', $this->getClasses($item));

        $template->assign('HREF', $item->getHref());
        $template->assign('LABEL', $item->getLabel());

        return $template->fetch(self::TEMPLATE_FILE);
    }

    /**
     * @return string
     */
    protected function getClasses(LinkItem $item) : string
    {
        $classes = [];

        if( $item->isActiveState() )
        {
            $classes[] = Constants::BS_CLASS_ACTIVE;
        }

        if( $item->isDisabledState() )
        {
            $classes[] = Constants::BS_CLASS_DISABLED;
        }

        return implode(' ', $classes);
    }
}
