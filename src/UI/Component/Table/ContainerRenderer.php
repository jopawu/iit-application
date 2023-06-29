<?php

namespace iit\Application\UI\Component\Table;

use iit\Application\UI\Element\Table\Container as TableElement;
use iit\Application\UI\ModuleAbstract;
use iit\Application\UI\RendererAbstract;

/**
 * @author      Björn Heyser <info@bjoernheyser.de>
 */
class ContainerRenderer extends RendererAbstract
{
    const TEMPLATE = 'UI/Component/table.html';

    const CSS_CLASS_ODD = 'odd';
    const CSS_CLASS_EVEN = 'even';

    /**
     * @param ModuleAbstract $container
     * @return string
     */
    public function render(ModuleAbstract $container) : string
    {
        /* @var Container $container */
        $this->assertInstanceOf($container, [Container::class]);

        $template = $this->getTemplate();

        $template->assign('TITLE_HEADER', $container->getTitle());
        $template->assign('TABLE', $this->buildTableElement($container)->render());

        return $template->fetch(self::TEMPLATE);
    }

    /**
     * @param Container $container
     * @return TableElement
     */
    protected function buildTableElement(Container $container): TableElement
    {
        $tui = $this->dic->ui()->element()->table();

        $headCells = [];
        foreach($container->getColumnSet() as $column)
        {
            $headCells[] = $tui->cell($column->getLabel(), true);
        }

        $oddRow = true;
        $bodyRows = [];
        foreach($container->getDataSets() as $dataSet)
        {
            $rowCells = [];

            foreach($dataSet as $cellKey => $cellContent)
            {
                $cellContent = $container->getColumnSet()->getColumn($cellKey)
                    ->getFormatter()->format($cellContent);

                $rowCells[] = $tui->cell($cellContent);
            }

            $bodyRows[] = $tui->row($rowCells)->withCssClassAdded(
                $oddRow ? self::CSS_CLASS_ODD : self::CSS_CLASS_EVEN
            );

            $oddRow = !$oddRow;
        }

        return $tui->container($bodyRows)->withHeadRow($tui->row($headCells));
    }
}