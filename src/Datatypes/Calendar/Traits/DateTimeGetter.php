<?php

namespace iit\Application\Datatypes\Calendar\Traits;

/**
 * @author      Björn Heyser <info@bjoernheyser.de>
 */
trait DateTimeGetter
{
    /**
     * @return int
     */
    public function getSecondsInt() : int
    {
        return (int)date('s', $this->unixTimestamp);
    }

    /**
     * @return int
     */
    public function getMinutesInt() : int
    {
        return (int)date('i', $this->unixTimestamp);
    }

    /**
     * @return int
     */
    public function getHoursInt() : int
    {
        return (int)date('H', $this->unixTimestamp);
    }

    /**
     * @return string
     */
    public function getMysqlTime() : string
    {
        return date('H:i:s', $this->unixTimestamp);
    }

    /**
     * @return string
     */
    public function getMysqlDateTime() : string
    {
        return date('Y-m-d H:i:s', $this->unixTimestamp);
    }
}