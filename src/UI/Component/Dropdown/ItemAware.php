<?php

namespace iit\Application\UI\Component\Dropdown;

/**
 * @author      Björn Heyser <info@bjoernheyser.de>
 */
interface ItemAware
{
    /**
     * @return string
     */
    public function getLabel() : string;

    /**
     * @return string
     */
    public function getHref() : string;

    /**
     * @return bool
     */
    public function isActiveState() : bool;
    
    /**
     * @return bool
     */
    public function isDisabledState() : bool;
}
