<?php

namespace iit\Application\Filetypes\PDF\Content;

use iit\Application\Filetypes\PDF\PDF;

interface Content
{
    /**
     * @param PDF $pdf
     * @return string
     */
    public function get(PDF $pdf) : string;
}