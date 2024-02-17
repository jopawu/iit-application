<?php

namespace iit\Application\Filetypes\PDF\Content;

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
     * @return string
     */
    public function get(): string
    {
        return $this->content;
    }
}