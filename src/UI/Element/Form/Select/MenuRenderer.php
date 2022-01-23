<?php

namespace iit\Application\UI\Element\Form\Select;

use iit\Application\UI\RendererAbstract;
use iit\Application\UI\ModuleAbstract;

/**
 * @author      Björn Heyser <info@bjoernheyser.de>
 */
class MenuRenderer extends RendererAbstract
{
    const TEMPLATE = 'UI/Element/Form/select.html';

    /**
     * @param ModuleAbstract $menu
     * @return string
     */
    public function render(ModuleAbstract $menu) : string
    {
        /* @var Menu $menu */
        $this->assertInstanceOf($menu, [Menu::class]);

        $template = $this->getTemplate();

        $template->assign('ID', $menu->getId());
        $template->assign('NAME', $menu->getName());
        $template->assign('OPTIONS', $this->buildOptionsArray($menu));

        return $template->fetch(self::TEMPLATE);
    }

    /**
     * @param Menu $menu
     * @return array
     */
    protected function buildOptionsArray(Menu $menu) : array
    {
        $options = [];

        foreach($menu->getOptions() as $option)
        {
            $options[] = [
                'label' => $option->getLabel(),
                'value' => $option->getValue(),
                'selected' => $option->isSelected()
            ];
        }

        return $options;
    }
}
