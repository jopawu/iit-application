<?php

namespace iit\Application\Datatypes\Calendar\Calculation;

use iit\Application\Helper\DicTrait;

/**
 * @author      Björn Heyser <info@bjoernheyser.de>
 */
class Factory
{
    use DicTrait;

    /**
     * @param int $unixTimestamp
     * @return DateTimeCalculator
     */
    public function datetime(int $unixTimestamp): DateTimeCalculator
    {
        return new DateTimeCalculator($unixTimestamp);
    }
}