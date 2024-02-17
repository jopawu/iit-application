<?php

namespace iit\Application\Filetypes\PDF\Content;

interface Content
{
    /**
     * @return string
     */
    public function get() : string;
}