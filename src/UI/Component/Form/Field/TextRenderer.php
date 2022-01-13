<?php

namespace iit\Application\UI\Component\Form\Field;

use iit\Application\UI\RendererAbstract;
use iit\Application\UI\ModuleAbstract;
use iit\Application\UI\Component\Form\Fieldset;

/**
 * @author      Björn Heyser <info@bjoernheyser.de>
 */
class TextRenderer extends RendererAbstract
{

    const TEMPLATE = 'UI/Component/Form/Field/text.html';
    /**
     * @param ModuleAbstract $field
     * @return string
     */
    public function render(ModuleAbstract $field) : string
    {
        /* @var Text $field */
        $this->assertInstanceOf($field, [Text::class]);

        $template = $this->getTemplate();

        $template->assign('ID', $field->getId());
        $template->assign('LABEL', $field->getLabel());
        $template->assign('INPUT', $this->renderInput($field));

        return $template->fetch(self::TEMPLATE);
    }

    /**
     * @param Text $field
     * @return string
     */
    protected function renderInput(Text $field) : string
    {
        $input = $this->dic->ui()->element()->form()->input(
            $field->getId(), $field->getName(), $field->getValue()
        );

        return $input->render();
    }
}
