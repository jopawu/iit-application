<?php

namespace iit\Application\UI\Element\Form;

use iit\Application\UI\RendererAbstract;
use iit\Application\UI\ModuleAbstract;

/**
 * @author      Björn Heyser <info@bjoernheyser.de>
 */
class HiddenRenderer extends RendererAbstract
{
    const TEMPLATE = 'UI/Element/Form/hidden.html';

    /**
     * @param ModuleAbstract $hidden
     * @return string
     */
    public function render(ModuleAbstract $hidden) : string
    {
        /* @var Hidden $hidden */
        $this->assertInstanceOf($hidden, [Hidden::class]);

        $template = $this->getTemplate();

        $template->assign('NAME', $hidden->getName());
        $template->assign('VALUE', $hidden->getValue());

        return $template->fetch(self::TEMPLATE);
    }

}
