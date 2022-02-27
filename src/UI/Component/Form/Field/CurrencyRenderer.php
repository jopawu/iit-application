<?php

namespace iit\Application\UI\Component\Form\Field;

use iit\Application\UI\RendererAbstract;
use iit\Application\UI\ModuleAbstract;

/**
 * @author      Björn Heyser <info@bjoernheyser.de>
 */
class CurrencyRenderer extends RendererAbstract
{
    const TEMPLATE = 'UI/Component/Form/Field/currency.html';
    /**
     * @param ModuleAbstract $field
     * @return string
     */
    public function render(ModuleAbstract $field) : string
    {
        /* @var Currency $field */
        $this->assertInstanceOf($field, [Currency::class]);

        $template = $this->getTemplate();

        $template->assign('ID', $field->getId());
        $template->assign('LABEL', $field->getLabel());
        $template->assign('CURRENCY', $field->getValue()->getWaehrung());
        $template->assign('INPUT', $this->renderInput($field));

        return $template->fetch(self::TEMPLATE);
    }

    /**
     * @param Currency $field
     * @return string
     */
    protected function renderInput(Currency $field) : string
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
