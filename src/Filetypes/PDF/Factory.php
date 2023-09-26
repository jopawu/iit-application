<?php

namespace iit\Application\Filetypes\PDF;

use iit\Application\Helper\DicTrait;

/**
 * @author      Björn Heyser <info@bjoernheyser.de>
 */
class Factory
{
    use DicTrait;

    /**
     * @param string $html
     * @return PDF
     */
    public function fromHtml(string $html) : PDF
    {
        return PDF::fromHtml($html);
    }
}