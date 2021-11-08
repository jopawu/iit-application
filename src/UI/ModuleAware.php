<?php

namespace iit\Application\UI;

/**
 * @author      Björn Heyser <info@bjoernheyser.de>
 */
interface ModuleAware
{
    /**
     * @return string
     */
    public function render() : string;
}
