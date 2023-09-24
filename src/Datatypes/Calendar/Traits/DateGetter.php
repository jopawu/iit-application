<?php

namespace iit\Application\Datatypes\Calendar\Traits;

/**
 * @author      Björn Heyser <info@bjoernheyser.de>
 */
trait DateGetter
{
    /**
     * @return int
     */
    public function getWeekdayInt() : int
    {
        return (int)date('W', $this->unixTimestamp);
    }

    /**
     * @return int
     */
    public function getDayInt() : int
    {
        return (int)date('d', $this->unixTimestamp);
    }

    /**
     * @return int
     */
    public function getMonthInt() : int
    {
        return (int)date('m', $this->unixTimestamp);
    }

    /**
     * @return int
     */
    public function getYearInt() : int
    {
        return (int)date('Y', $this->unixTimestamp);
    }

    /**
     * @return string
     */
    public function getYearMonth() : string
    {
        return date('Y.m', $this->unixTimestamp);
    }

    /**
     * @return string
     */
    public function getMysqlDate() : string
    {
        return date('Y-m-d', $this->unixTimestamp);
    }
}