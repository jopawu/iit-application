<?php

namespace iit\Application\UI\Element\Table;

use iit\Application\UI\RendererAbstract;
use iit\Application\UI\ModuleAbstract;

/**
 * @author      Björn Heyser <info@bjoernheyser.de>
 */
class CellRenderer extends RendererAbstract
{
    const TEMPLATE_FILE = 'UI/Element/Table/Cell.html';

    /**
     * @param ModuleAbstract $cell
     * @return string
     */
    public function render(ModuleAbstract $cell) : string
    {
        /* @var Cell $cell */
        $this->assertInstanceOf($cell, [Cell::class]);

        $template = $this->getTemplate();

        $template->assign('ISHEAD', (int)$cell->isHeaderCell());
        $template->assign('CONTENT', $cell->getContent());
        $template->assign('STYLES', $this->getStyles($cell));

        return $template->fetch(self::TEMPLATE_FILE);
    }

    /**
     * @param Cell $cell
     * @return string
     */
    public function getStyles(Cell $cell) : string
    {
        $styles = [];

        if( $cell->hasAlign() )
        {
            $styles[] = "text-align: {$cell->getAlign()};";
        }

        if( $cell->hasWidth() )
        {
            $styles[] = "width: {$cell->getWidth()};";
        }

        return implode(' ', $styles);
    }
}
