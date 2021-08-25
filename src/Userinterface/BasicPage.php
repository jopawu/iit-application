<?php

/* Copyright (c) 1998-2019 ILIAS open source, Extended GPL, see docs/LICENSE */

namespace iit\Application\Userinterface;

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
