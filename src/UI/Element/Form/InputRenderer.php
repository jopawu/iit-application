<?php

namespace iit\Application\UI\Element\Form;

use iit\Application\UI\RendererAbstract;
use iit\Application\UI\ModuleAbstract;

/**
 * @author      Björn Heyser <info@bjoernheyser.de>
 */
class InputRenderer extends RendererAbstract
{
    const TEMPLATE = 'UI/Element/Form/input.html';

    /**
     * @param ModuleAbstract $input
     * @return string
     */
    public function render(ModuleAbstract $input) : string
    {
        /* @var Input $input */
        $this->assertInstanceOf($input, [Input::class]);

        $template = $this->getTemplate();

        $template->assign('ID', $input->getId());
        $template->assign('TYPE', $input->getType());
        $template->assign('NAME', $input->getName());
        $template->assign('VALUE', $input->getValue());
        $template->assign('SIZE', $input->getSize());
        $template->assign('MAXLENGTH', $input->getMaxlength());

        $this->renderAttributes($template, $input);
        $this->renderCssClasses($template, $input);

        return $template->fetch(self::TEMPLATE);
    }
}
