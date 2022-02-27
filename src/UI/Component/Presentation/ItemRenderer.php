<?php

namespace iit\Application\UI\Component\Presentation;

use iit\Application\UI\RendererAbstract;
use iit\Application\UI\ModuleAbstract;
use iit\Application\UI\Layout\Grid\Row;

/**
 * @author      Björn Heyser <info@bjoernheyser.de>
 */
class ItemRenderer extends RendererAbstract
{
    const TEMPLATE = 'UI/Component/Presentation/item.html';

    const CSS_CLASS_PROPERTY_LABEL = 'propertyLabel';
    const CSS_CLASS_PROPERTY_VALUE = 'propertyValue';
    /**
     * @param ModuleAbstract $item
     * @return string
     */
    public function render(ModuleAbstract $item) : string
    {
        /* @var Item $item */
        $this->assertInstanceOf($item, [Item::class]);

        if( $item->hasLeadingContent() || $item->hasTrailingContent() )
        {
            $gf = $this->dic->ui()->layout()->grid();
            return $gf->row($this->getBodySurroundingColumns($item))->render();
        }

        return $this->getRenderedBodyContent($item);
    }

    /**
     * @param Item $item
     * @return string
     */
    protected function getRenderedBodyContent(Item $item) : string
    {
        $template = $this->getTemplate();

        $template->assign('TITLE', $item->getTitle());
        $template->assign('DESCRIPTION', $item->getDescription());
        $template->assign('PROPERTIES', $this->getPropertiesGrid($item)->render());
        $template->assign('CONTENTS', $item->getContents());

        return $template->fetch(self::TEMPLATE);
    }

    /**
     * @param Item $item
     * @return Row
     */
    protected function getPropertiesGrid(Item $item) : Row
    {
        $gf = $this->dic->ui()->layout()->grid();

        $columns = [];

        foreach($item->getProperties() as $name => $value)
        {
            $property = $gf->row([
                $gf->col($name)->withWidth(5)->withCssClassAdded(self::CSS_CLASS_PROPERTY_LABEL),
                $gf->col($value)->withWidth(7)->withCssClassAdded(self::CSS_CLASS_PROPERTY_VALUE)
            ]);

            $columns[] = $gf->col($property->render())->withWidth(6);
        }

        return $gf->row($columns);
    }

    /**
     * @param Item $item
     * @return array
     */
    protected function getBodySurroundingColumns(Item $item) : array
    {
        $gf = $this->dic->ui()->layout()->grid();

        $columns = [];

        if( $item->hasLeadingContent() )
        {
            $columns[] = $gf->col($item->getLeadingContent())->withWidth(
                $this->getSurroundingColumnWidth($item)
            );
        }

        $columns[] = $gf->col($this->getRenderedBodyContent($item))
                        ->withWidth($this->getBodyColumnWidth($item));

        if( $item->hasTrailingContent() )
        {
            $columns[] = $gf->col($item->getTrailingContent())->withWidth(
                $this->getSurroundingColumnWidth($item)
            );
        }

        return $columns;
    }

    /**
     * @param Item $item
     * @return int
     */
    protected function getBodyColumnWidth(Item $item) : int
    {
        if( $item->hasLeadingContent() && $item->hasTrailingContent() )
        {
            return $item->isLargeSurroundingContent() ? 4 : 6;
        }

        if( $item->hasLeadingContent() || $item->hasTrailingContent() )
        {
            return $item->isLargeSurroundingContent() ? 6 : 9;
        }

        return 12;
    }

    /**
     * @param Item $item
     * @return int
     */
    protected function getSurroundingColumnWidth(Item $item) : int
    {
        if( !$item->isLargeSurroundingContent() )
        {
            return 3;
        }

        if( $item->hasLeadingContent() && $item->hasTrailingContent() )
        {
            return 4;
        }

        if( $item->hasLeadingContent() || $item->hasTrailingContent() )
        {
            return 6;
        }

        return 0;
    }
}
