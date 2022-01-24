<?php

namespace iit\Application\Datatypes\Time;

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
        $this->unixTimestamp = $unixTimestamp;
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
     * @param string $format
     * @return string
     */
    public function getPresentation(string $format = 'd.m.Y') : string
    {
        return date($format, $this->unixTimestamp);
    }

    /**
     * @return string
     */
    public function getMysqlDate() : string
    {
        return date("Y-m-d", $this->unixTimestamp);
    }

    /**
     * @return string
     */
    public function getMysqlDateTime() : string
    {
        return date("Y-m-d H:i:s", $this->unixTimestamp);
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
     * @param string $mysqlDate
     * @return Date
     */
    public static function fromMysqlDate(string $mysqlDate) : Date
    {
        list($y, $m, $d) = explode('-', $mysqlDate);
        return new self( mktime(0, 0, 0, (int)$m, (int)$d, (int)$y) );
    }

    /**
     * @param string $mysqlDate
     * @return Date
     */
    public static function fromMysqlDateTime(string $mysqlDateTime) : Date
    {
        list($date, $time) = explode(' ', $mysqlDateTime);
        list($y, $m, $d) = explode('-', $date);
        list($h, $i, $s) = explode(':', $date);
        return new self( mktime((int)$h, (int)$i, (int)$s, (int)$m, (int)$d, (int)$y) );
    }

    /**
     * @return Date
     */
    public static function fromNowDate() : Date
    {
        return new self( time() );
    }

    /**
     * @param string $datePresentation
     * @return Date
     */
    public static function fromDatePresentation(string $datePresentation) : Date
    {
        if( !preg_match('/^\d{1,2}.\d{1,2}.\d{2,4}$/', $datePresentation) )
        {
            throw new InvalidArgumentException("invalid date presentation string given: {$datePresentation}");
        }

        list($d, $m, $y) = explode('.', $datePresentation);

        return new self( mktime(0, 0, 0, (int)$m, (int)$d, (int)$y) );
    }
}
