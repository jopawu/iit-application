<?php

namespace iit\Application\UI;

/**
 * @author      Björn Heyser <info@bjoernheyser.de>
 */
class BasicPage
{
    protected $template;

    protected $pageContent;

    public function __construct()
    {
        $this->template = new \Smarty();
    }
}
