<?php

namespace iit\Application\UI\Element\Content\Paragraph;

use iit\Application\UI\RendererAbstract;
use iit\Application\UI\ModuleAbstract;

/**
 * @author      Björn Heyser <info@bjoernheyser.de>
 */
class StandardRenderer extends RendererAbstract
{
    const TEMPLATE = 'UI/Element/Content/Paragraph/Standard.html';

    /**
     * @param ModuleAbstract $standard
     * @return string
     */
    public function render(ModuleAbstract $standard) : string
    {
        /* @var Standard $standard */
        $this->assertInstanceOf($standard, [Standard::class]);

        $template = $this->getTemplate();

        $template->assign('CONTENT', $standard->getContent());

        return $template->fetch(self::TEMPLATE);
    }
}
