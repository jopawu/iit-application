<?php

namespace iit\Application\UI\Component\Presentation;

use iit\Application\UI\RendererAbstract;
use iit\Application\UI\ModuleAbstract;

/**
 * @author      Björn Heyser <info@bjoernheyser.de>
 */
class ListingRenderer extends RendererAbstract
{
    const TEMPLATE = 'UI/Component/Presentation/listing.html';

    /**
     * @param ModuleAbstract $listing
     * @return string
     */
    public function render(ModuleAbstract $listing) : string
    {
        /* @var Listing $listing */
        $this->assertInstanceOf($listing, [Listing::class]);

        $template = $this->getTemplate();
        
        $template->assign('TITLE', $listing->getTitle());
        $template->assign('DESCRIPTION', $listing->getDescription());
        $template->assign('ITEMS', $listing->getItems());

        return $template->fetch(self::TEMPLATE);
    }
}
