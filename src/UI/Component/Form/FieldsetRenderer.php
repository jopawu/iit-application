<?php

namespace iit\Application\UI\Component\Form;

use iit\Application\UI\RendererAbstract;
use iit\Application\UI\ModuleAbstract;

/**
 * @author      Björn Heyser <info@bjoernheyser.de>
 */
class FieldsetRenderer extends RendererAbstract
{
    const TEMPLATE = 'UI/Component/Form/fieldset.html';
    /**
     * @param ModuleAbstract $fieldset
     * @return string
     */
    public function render(ModuleAbstract $fieldset) : string
    {
        /* @var Fieldset $fieldset */
        $this->assertInstanceOf($fieldset, [Fieldset::class]);

        $template = $this->getTemplate();

        $template->assign('LABEL', $fieldset->getLabel());
        $template->assign('FIELDGRID', $this->renderFieldgrid($fieldset));

        return $template->fetch(self::TEMPLATE);
    }

    /**
     * @param Fieldset $fieldset
     * @return string
     */
    protected function renderFieldgrid(Fieldset $fieldset) : string
    {
        $gui = $this->dic->ui()->layout()->grid();

        $columns = [];

        foreach($fieldset->getFields() as $field)
        {
            $columns[] = $gui->col($field->render())->render();
        }

        return $gui->row($columns)->render();
    }
}
