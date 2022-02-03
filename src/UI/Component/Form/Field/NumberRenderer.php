<?php

namespace iit\Application\UI\Component\Form\Field;

use iit\Application\UI\RendererAbstract;
use iit\Application\UI\ModuleAbstract;

/**
 * @author      Björn Heyser <info@bjoernheyser.de>
 */
class NumberRenderer extends RendererAbstract
{
    const TEMPLATE = 'UI/Component/Form/Field/number.html';
    /**
     * @param ModuleAbstract $field
     * @return string
     */
    public function render(ModuleAbstract $field) : string
    {
        /* @var Number $field */
        $this->assertInstanceOf($field, [Number::class]);

        $template = $this->getTemplate();

        $template->assign('ID', $field->getId());
        $template->assign('LABEL', $field->getLabel());
        $template->assign('PREFIX', $field->getPrefix());
        $template->assign('INPUT', $this->renderInput($field));

        return $template->fetch(self::TEMPLATE);
    }

    /**
     * @param Number $field
     * @return string
     */
    protected function renderInput(Number $field) : string
    {
        $input = $this->dic->ui()->element()->form()->input(
            $field->getId(), $field->getName(), $field->getValue()
        )->withTypeNumber()->withClassAdded('');

        $input = $input->withAttributeAdded('min', '0')
                       ->withAttributeAdded('step', '1');
//                       ->withAttributeAdded('data-number-to-fixed', '2')
//                       ->withAttributeAdded('data-number-stepfactor', '100');

        return $input->render();
    }
}
