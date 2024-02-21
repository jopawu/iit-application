<?php

namespace iit\Application\Filetypes\PDF\Content;

use iit\Application\Filetypes\PDF\PDF;

/**
 * @author      Björn Heyser <info@bjoernheyser.de>
 */
class PageXY extends Simple
{
    /**
     * @param string $content
     */
    public function __construct(string $content)
    {
        if( !$this->isValidContent($content) )
        {
            throw new \InvalidArgumentException(
                "invalid PageXY compliant content given: {$content}"
            );
        }

        $this->content = $content;
    }

    /**
     * @param PDF $pdf
     * @return string
     */
    public function get(PDF $pdf): string
    {
        return sprintf(
            $this->content,
            $pdf->getAliasNumPage(),
            $pdf->getAliasNbPages()
        );
    }

    /**
     * @param string $content
     * @return bool
     */
    protected function isValidContent(string $content) : bool
    {
        return true;
    }
}
