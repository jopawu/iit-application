<?php

namespace iit\Application\UI\Component\Dropdown;

use iit\Application\UI\RendererAbstract;
use iit\Application\UI\ModuleAbstract;
use iit\Application\UI\Constants;

/**
 * @author      Björn Heyser <info@bjoernheyser.de>
 */
class ItemRenderer extends RendererAbstract
{
    const TEMPLATE_FILE = 'UI/Component/Dropdown/Item.html';
    
    /**
     * @param ModuleAbstract $item
     * @return string
     */
    public function render(ModuleAbstract $item) : string
    {
        /* @var Item $item */
        $this->assertInstanceOf($item, [Item::class]);
        
        $template = $this->getTemplate();

        $template->assign('CLASSES', $this->getClasses($item));

        $template->assign('HREF', $item->getItemAware()->getHref());
        $template->assign('LABEL', $item->getItemAware()->getLabel());

        return $template->fetch(self::TEMPLATE_FILE);
    }

    /**
     * @return string
     */
    protected function getClasses(Item $item) : string
    {
        $classes = [];

        if( $item->getItemAware()->isActiveState() )
        {
            $classes[] = Constants::BS_CLASS_ACTIVE;
        }

        if( $item->getItemAware()->isDisabledState() )
        {
            $classes[] = Constants::BS_CLASS_DISABLED;
        }

        return implode(' ', $classes);
    }
}
