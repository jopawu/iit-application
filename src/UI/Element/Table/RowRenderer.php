<?php

namespace iit\Application\UI\Element\Table;

use iit\Application\UI\RendererAbstract;
use iit\Application\UI\ModuleAbstract;

/**
 * @author      Björn Heyser <info@bjoernheyser.de>
 */
class RowRenderer extends RendererAbstract
{
    const TEMPLATE_FILE = 'UI/Element/Table/Row.html';

    /**
     * @param ModuleAbstract $row
     * @return string
     */
    public function render(ModuleAbstract $row) : string
    {
        /* @var Row $row */
        $this->assertInstanceOf($row, [Row::class]);

        $template = $this->getTemplate();

        $template->assign('CELLS', $this->getRenderedCells($row->getCells()));

        return $template->fetch(self::TEMPLATE_FILE);
    }

    /**
     * @param Cell[] $cells
     * @return string[]
     */
    protected function getRenderedCells(array $cells) : array
    {
        $renderedCells = [];

        foreach($cells as $cell)
        {
            $renderedCells[] = $cell->render();
        }

        return $renderedCells;
    }
}
