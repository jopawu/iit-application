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

        return $template->fetch(self::TEMPLATE_FILE);
    }
}
