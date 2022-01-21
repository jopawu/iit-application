<?php

namespace iit\Application\UI\Layout\Grid;

use iit\Application\UI\RendererAbstract;
use iit\Application\UI\ModuleAbstract;

/**
 * @author      Björn Heyser <info@bjoernheyser.de>
 */
class ColRenderer extends RendererAbstract
{
    const TEMPLATE = 'UI/Layout/Grid/col.html';

    /**
     * @param ModuleAbstract $col
     * @return string
     */
    public function render(ModuleAbstract $col) : string
    {
        /* @var Col $col */
        $this->assertInstanceOf($col, [Col::class]);

        $template = $this->getTemplate();

        $template->assign('CLASSES', $this->getGridClasses($col));
        $template->assign('CONTENT', $col->getContent());

        return $template->fetch(self::TEMPLATE);
    }

    /**
     * @param Col $col
     * @return string
     */
    public function getGridClasses(Col $col) : string
    {
        $classes = [];

        foreach($col->getWidth() as $screen => $width)
        {
            $classes[] = "{$screen}-{$width}";
        }

        return implode(' ', $classes);
    }
}
