<?php

namespace iit\Application\Datatypes\Calendar\Date;

use iit\Application\Datatypes\Calendar\Calculation\DateTimeCalculator;
use iit\Application\Helper\DicTrait;

/**
 * @author      Björn Heyser <info@bjoernheyser.de>
 */
class Factory
{
    use DicTrait;

    /**
     * @return Date
     */
    public function today() : Date
    {
        return new Date($this->dic, time());
    }

    /**
     * @param string $mysqlDate
     * @return Date
     */
    public function mysql(string $mysqlDate) : Date
    {
        list($y, $m, $d) = explode('-', $mysqlDate);

        $unixTimestamp = mktime(0, 0, 0, (int)$m, (int)$d, (int)$y);

        return new Date($this->dic, $unixTimestamp);
    }

    /**
     * @param string $datePresentation
     * @return Date
     */
    public function presentation(string $datePresentation) : Date
    {
        if( !preg_match('/^\d{1,2}.\d{1,2}.\d{2,4}$/', $datePresentation) )
        {
            throw new InvalidArgumentException("invalid date presentation string given: {$datePresentation}");
        }

        list($d, $m, $y) = explode('.', $datePresentation);

        return new Date( mktime(0, 0, 0, (int)$m, (int)$d, (int)$y) );
    }

    /**
     * @param string $mysqlDate
     * @return bool
     */
    public static function isMysqlDate(string $mysqlDate) : bool
    {
        return preg_match('/^\d{4}-\d{2}-\d{2}$/', $mysqlDate);
    }

    /**
     * @param string $datePresentation
     * @return bool
     */
    public static function isDatePresentation(string $datePresentation) : bool
    {
        return preg_match('/^\d{1,2}.\d{1,2}.\d{2,4}$/', $datePresentation);
    }
}