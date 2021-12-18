<?php

namespace iit\Application\UI\Element\Table;

use iit\Application\UI\RendererAbstract;
use iit\Application\UI\ModuleAbstract;

/**
 * @author      Björn Heyser <info@bjoernheyser.de>
 */
class ContainerRenderer extends RendererAbstract
{
    const TEMPLATE_FILE = 'UI/Element/Table/Container.html';

    /**
     * @param ModuleAbstract $container
     * @return string
     */
    public function render(ModuleAbstract $container) : string
    {
        /* @var Container $container */
        $this->assertInstanceOf($container, [Container::class]);

        $template = $this->getTemplate();

        if( $container->hasHeadRow() )
        {
            $template->assign('HEADROW', $container->getHeadRow()->render());
        }

        if( $container->hasFootRow() )
        {
            $template->assign('FOOTROW', $container->getFootRow()->render());
        }

        if( $container->hasBodyRows() )
        {
            $template->assign('BODYROWS', $this->getRenderedRows($container->getBodyRows()));
        }

        return $template->fetch(self::TEMPLATE_FILE);
    }

    /**
     * @param Row[] $rows
     * @return string[]
     */
    protected function getRenderedRows(array $rows) : array
    {
        $renderedRows = [];

        foreach($rows as $row)
        {
            $renderedRows[] = $row->render();
        }

        return $renderedRows;
    }
}
