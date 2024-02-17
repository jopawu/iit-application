<?php

namespace iit\Application\Filetypes\PDF\Content;

/**
 * @author      Björn Heyser <info@bjoernheyser.de>
 */
class PageX extends Simple
{
    /**
     * @param string $content
     */
    public function __construct(string $content)
    {
        if( !$this->isValidContent($content) )
        {
            throw new \InvalidArgumentException(
                "invalid PageX compliant content given: {$content}"
            );
        }

        $this->content = $content;
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
