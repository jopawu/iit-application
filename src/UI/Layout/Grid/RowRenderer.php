<?php

namespace iit\Application\UI\Layout\Grid;

use iit\Application\UI\RendererAbstract;
use iit\Application\UI\ModuleAbstract;

/**
 * @author      Björn Heyser <info@bjoernheyser.de>
 */
class RowRenderer extends RendererAbstract
{
    const TEMPLATE = 'UI/Layout/Grid/row.html';

    /**
     * @param ModuleAbstract $row
     * @return string
     */
    public function render(ModuleAbstract $row) : string
    {
        /* @var Row $row */
        $this->assertInstanceOf($row, [Row::class]);

        $template = $this->getTemplate();

        $this->renderCssClasses($template, $row);

        $template->assign('COLUMNS', $this->getRenderedColumns($row));

        return $template->fetch(self::TEMPLATE);
    }

    /**
     * @param Row $row
     * @return string
     */
    public function getCssClasses(Row $row) : string
    {
        return implode(' ', $row->getCssClasses());
    }

    /**
     * @param Row $row
     * @return string[]
     */
    public function getRenderedColumns(Row $row) : array
    {
        $columns = [];

        foreach($row->getColumns() as $col)
        {
            $columns[] = $col->render();
        }

        return $columns;
    }
}
