<?php

namespace iit\Application\Datatypes\Calendar\Date;

use InvalidArgumentException;

/**
 * @author      Björn Heyser <info@bjoernheyser.de>
 */
class Date
{
    /**
     * @var int
     */
    protected $unixTimestamp;

    /**
     * @param int $unixTimestamp
     */
    public function __construct(int $unixTimestamp)
    {
        $this->unixTimestamp = $this->ensureUnixTimestampStartOfDay($unixTimestamp);
    }

    /**
     * @return int
     */
    public function getUnixTimestamp() : int
    {
        return $this->unixTimestamp;
    }

    /**
     * @return int
     */
    public function getDayInt() : int
    {
        return (int)date("d", $this->unixTimestamp);
    }

    /**
     * @return int
     */
    public function getMonthInt() : int
    {
        return (int)date("m", $this->unixTimestamp);
    }

    /**
     * @return int
     */
    public function getYearInt() : int
    {
        return (int)date("Y", $this->unixTimestamp);
    }

    /**
     * @return string
     */
    public function getYearMonth() : string
    {
        return date("Y.m", $this->unixTimestamp);
    }

    /**
     * @return string
     */
    public function getMysqlDate() : string
    {
        return date("Y-m-d", $this->unixTimestamp);
    }

    /**
     * @param int $days
     * @return Date
     */
    public function withAddedDays(int $days) : Date
    {
        $clone = clone $this;

        if( $days == 0 )
        {
            return $clone;
        }

        if( $days > 0 )
        {
            $unit = $days > 1 ? 'days' : 'day';
            $modify = "+{$days} {$unit}";
        }
        else
        {
            $unit = $days < -1 ? 'days' : 'day';
            $modify = "{$days} {$unit}";
        }

        $clone->unixTimestamp = strtotime("{$this->getMysqlDate()} {$modify}");

        return $clone;
    }

    /**
     * @param int $months
     * @return Date
     */
    public function withAddedMonths(int $months) : Date
    {
        $clone = clone $this;

        if( $months == 0 )
        {
            return $clone;
        }

        if( $months > 0 )
        {
            $unit = $months > 1 ? 'months' : 'month';
            $modify = "+{$months} {$unit}";
        }
        else
        {
            $unit = $months < -1 ? 'months' : 'month';
            $modify = "{$months} {$unit}";
        }

        $clone->unixTimestamp = strtotime("{$this->getMysqlDate()} {$modify}");

        return $clone;
    }

    /**
     * @return Date
     */
    public function withResetToFirstOfMonth() : Date
    {
        $clone = clone $this;
        list($y, $m, $d) = explode('-', $this->getMysqlDate());
        $clone->unixTimestamp = mktime(0, 0, 0, (int)$m, 1, (int)$y);
        return $clone;
    }

    /**
     * @param Date $date
     * @return bool
     */
    public function isSameOrLater(Date $date) : bool
    {
        return $this->getUnixTimestamp() >= $date->getUnixTimestamp();
    }

    /**
     * @param int $unixTimestamp
     * @return int
     */
    private function ensureUnixTimestampStartOfDay(int $unixTimestamp) : int
    {
        list($y, $m, $d) = explode('-', date('Y-m-d', $unixTimestamp));
        $unixTimestamp = mktime(0, 0, 0, (int)$m, (int)$d, (int)$y);
        return $unixTimestamp;
    }
}
