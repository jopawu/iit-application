<?php

namespace iit\Application\UI\Component\Form\Field;

use iit\Application\UI\RendererAbstract;
use iit\Application\UI\ModuleAbstract;

/**
 * @author      Björn Heyser <info@bjoernheyser.de>
 */
class MoneyRenderer extends RendererAbstract
{
    const TEMPLATE = 'UI/Component/Form/Field/currency.html';
    /**
     * @param ModuleAbstract $field
     * @return string
     */
    public function render(ModuleAbstract $field) : string
    {
        /* @var Money $field */
        $this->assertInstanceOf($field, [Money::class]);

        $template = $this->getTemplate();

        $template->assign('ID', $field->getId());
        $template->assign('LABEL', $field->getLabel());
        $template->assign('CURRENCY', $field->getValue()->getCurrency()->getUnitSymbol());
        $template->assign('INPUT', $this->renderInput($field));

        return $template->fetch(self::TEMPLATE);
    }

    /**
     * @param Money $field
     * @return string
     */
    protected function renderInput(Money $field) : string
    {
        $input = $this->dic->ui()->element()->form()->input(
            $field->getId(), $field->getName(), $field->getValue()->getDecimal()
        )->withTypeNumber()
         ->withCssClassAdded('currency');

        $input = $input->withAttributeAdded('min', '0')
                       ->withAttributeAdded('step', '0.01')
                       ->withAttributeAdded('data-number-to-fixed', '2')
                       ->withAttributeAdded('data-number-stepfactor', '100');

        return $input->render();
    }
}
