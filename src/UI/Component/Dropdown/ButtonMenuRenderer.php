<?php

namespace iit\Application\UI\Component\Dropdown;

use iit\Application\UI\ModuleAbstract;

/**
 * @author      Björn Heyser <info@bjoernheyser.de>
 */
class ButtonMenuRenderer extends DropdownRendererAbstract
{
    const TEMPLATE_FILE = 'UI/Component/Dropdown/Menu.html';

    const BUTTON_CSS_CLASS = 'btn';

    /**
     * @param ModuleAbstract $buttonMenu
     * @return string
     */
    public function render(ModuleAbstract $buttonMenu) : string
    {
        /* @var ButtonMenu $buttonMenu */
        $this->assertInstanceOf($buttonMenu, [ButtonMenu::class]);

        $template = $this->getTemplate();
        
        if( $buttonMenu->hasImage() )
        {
            $template->assign('IMAGE', $buttonMenu->getImage()->render());
        }
        
        $template->assign('CLASSES', $this->getClasses($buttonMenu));
        $template->assign('LABEL', $buttonMenu->getLabel());
        $template->assign('ITEMS', $this->getRenderedItems($buttonMenu->getItems()));

        return $template->fetch(self::TEMPLATE_FILE);
    }

    /**
     * @param ButtonMenu $buttonMenu
     * @return string
     */
    protected function getClasses(ButtonMenu $buttonMenu) : string
    {
        $classes = [
            self::BUTTON_CSS_CLASS
        ];

        return implode(' ', $classes);
    }
}
