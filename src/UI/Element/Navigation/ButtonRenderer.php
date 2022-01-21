<?php

namespace iit\Application\UI\Element\Navigation;

use iit\Application\UI\RendererAbstract;
use iit\Application\UI\ModuleAbstract;
use iit\Application\UI\Constants;

/**
 * @author      Björn Heyser <info@bjoernheyser.de>
 */
class ButtonRenderer extends RendererAbstract
{
    const TEMPLATE = 'UI/Element/Navigation/button.html';

    /**
     * @param ModuleAbstract $button
     * @return string
     */
    public function render(ModuleAbstract $button) : string
    {
        /* @var Button $button */
        $this->assertInstanceOf($button, [Button::class]);

        $template = $this->getTemplate();

        $template->assign('HREF', $button->getHref());
        $template->assign('LABEL', $button->getLabel());
        $template->assign('CLASSES', $this->getClasses($button));

        return $template->fetch(self::TEMPLATE);
    }

    /**
     * @param Button $button
     * @return string
     */
    protected function getClasses(Button $button) : string
    {
        $classes = [];

        if( $button->isPrimaryState() )
        {
            $classes[] = 'btn-'.Constants::BS_CLASS_PRIMARY;
        }
        else
        {
            $classes[] = 'btn-'.Constants::BS_CLASS_SECONDARY;
        }

        return implode(' ', $classes);
    }
}
