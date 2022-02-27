<?php

namespace iit\Application\UI\Component\Form\Field;

use iit\Application\UI\RendererAbstract;
use iit\Application\UI\ModuleAbstract;

/**
 * @author      Björn Heyser <info@bjoernheyser.de>
 */
class SelectRenderer extends RendererAbstract
{
    const TEMPLATE = 'UI/Component/Form/Field/select.html';
    /**
     * @param ModuleAbstract $field
     * @return string
     */
    public function render(ModuleAbstract $field) : string
    {
        /* @var Select $field */
        $this->assertInstanceOf($field, [Select::class]);

        $template = $this->getTemplate();

        $template->assign('ID', $field->getId());
        $template->assign('LABEL', $field->getLabel());
        $template->assign('SELECT', $this->renderSelect($field));

        return $template->fetch(self::TEMPLATE);
    }

    /**
     * @param Select $field
     * @return string
     */
    protected function renderSelect(Select $field) : string
    {
        $input = $this->dic->ui()->element()->form()->select()->menu(
            $field->getId(), $field->getName(), $field->getOptions()
        );

        $input = $input->withCssClassesAdded($field->getCssClasses());

        return $input->render();
    }
}
