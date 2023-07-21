<?php

namespace iit\Application\Datatypes\Calendar\DateTime;

/**
 * @author      Björn Heyser <info@bjoernheyser.de>
 */
class DateTime extends Date
{
    /**
     * @param int $unixTimestamp
     */
    public function __construct(int $unixTimestamp)
    {
        $this->unixTimestamp = $unixTimestamp;
    }
}
