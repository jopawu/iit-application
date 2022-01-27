<?php

namespace iit\Application\UI\Component\Form;

interface SectionAware
{
    /**
     * @return string
     */
    public function render() : string;
}