<?php

namespace iit\Application\UI\Component\Form;

use iit\Application\UI\RendererAbstract;
use iit\Application\UI\ModuleAbstract;

/**
 * @author      Björn Heyser <info@bjoernheyser.de>
 */
class SubmitRenderer extends RendererAbstract
{
    const TEMPLATE = 'UI/Element/Form/submit.html';

    /**
     * @param ModuleAbstract $submit
     * @return string
     */
    public function render(ModuleAbstract $submit) : string
    {
        /* @var Submit $submit */
        $this->assertInstanceOf($submit, [Submit::class]);

        $template = $this->getTemplate();

        $template->assign('COMMAND', $submit->getCommand());
        $template->assign('LABEL', $submit->getLabel());

        return $template->fetch(self::TEMPLATE);
    }
}
