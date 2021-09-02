<?php

namespace iit\Application\UI;

/**
 * @author      Björn Heyser <info@bjoernheyser.de>
 */
class PageContent
{
    /**
     * @return string
     */
    protected $header;

    /**
     * @return string
     */
    protected $body;

    /**
     * @return string
     */
    protected $footer;

    /**
     * @return string
     */
    public function render()
    {
        return '';
    }
}
