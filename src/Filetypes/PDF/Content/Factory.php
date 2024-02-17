<?php

namespace iit\Application\Filetypes\PDF\Content;

use iit\Application\Helper\DicTrait;

/**
 * @author      Björn Heyser <info@bjoernheyser.de>
 */
class Factory
{
    use DicTrait;

    /**
     * @param string $content
     * @return Simple
     */
    public function simple(string $content) : Simple
    {
        return new Simple($content);
    }

    /**
     * @param string $content
     * @param string $format
     * @return Date
     */
    public function date(string $content, string $format) : Date
    {
        return new Date($format, $content);
    }

    /**
     * @param string $content
     * @return PageX
     */
    public function pageX(string $content) : PageX
    {
        return new PageX($content);
    }

    /**
     * @param string $content
     * @return PageXY
     */
    public function pageXY(string $content) : PageXY
    {
        return new PageXY($content);
    }
}