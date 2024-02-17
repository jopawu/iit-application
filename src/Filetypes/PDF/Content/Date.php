<?php

namespace iit\Application\Filetypes\PDF\Content;

/**
 * @author      Björn Heyser <info@bjoernheyser.de>
 */
class Date implements Content
{
    /**
     * @var string
     */
    protected $content;

    /**
     * @var string
     */
    protected $format;

    /**
     * @param string $content
     * @param string $format
     */
    public function __construct(string $content, string $format)
    {
        $this->content = $content;
        $this->format = $format;
    }

    /**
     * @return string
     */
    public function get(): string
    {
        return sprintf($this->content, date($this->format));
    }
}