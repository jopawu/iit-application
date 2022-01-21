<?php

namespace iit\Application\UI\Component\Form\Field;

use iit\Application\UI\RendererAbstract;
use iit\Application\UI\ModuleAbstract;

/**
 * @author      Björn Heyser <info@bjoernheyser.de>
 */
class DateRenderer extends RendererAbstract
{
    const TEMPLATE = 'UI/Component/Form/Field/date.html';
    /**
     * @param ModuleAbstract $date
     * @return string
     */
    public function render(ModuleAbstract $date) : string
    {
        /* @var Date $date */
        $this->assertInstanceOf($date, [Date::class]);

        $template = $this->getTemplate();

        $template->assign('ID', $date->getId());
        $template->assign('LABEL', $date->getLabel());
        $template->assign('INPUT', $this->renderInput($date));

        return $template->fetch(self::TEMPLATE);
    }

    /**
     * @param Date $date
     * @return string
     */
    protected function renderInput(Date $date) : string
    {
        $input = $this->dic->ui()->element()->form()->input(
            $date->getId(), $date->getName(), $date->getValue()->getPresentation('d.m.Y')
        );

        return $input->render();
    }
}
