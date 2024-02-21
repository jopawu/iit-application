<?php

namespace iit\Application\Filetypes\PDF\Content;

use iit\Application\Filetypes\PDF\PDF;

/**
 * @author      Björn Heyser <info@bjoernheyser.de>
 */
class Simple implements Content
{
    /**
     * @var string
     */
    protected $content;

    /**
     * @param string $content
     */
    public function __construct(string $content)
    {
        $this->content = $content;
    }

    /**
     * @param PDF $pdf
     * @return string
     */
    public function get(PDF $pdf): string
    {
        return $this->content;
    }
}