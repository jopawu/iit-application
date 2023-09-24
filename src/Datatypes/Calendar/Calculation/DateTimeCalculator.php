<?php

namespace iit\Application\Datatypes\Calendar\Calculation;

/**
 * @author      Björn Heyser <info@bjoernheyser.de>
 */
class DateTimeCalculator
{
    public const UNIT_SECONDS = 'seconds';
    public const UNIT_MINUTES = 'minutes';
    public const UNIT_HOURS = 'hours';
    public const UNIT_DAYS = 'days';
    public const UNIT_MONTHS = 'months';
    public const UNIT_YEARS = 'years';

    protected const UNIT_SECOND = 'second';
    protected const UNIT_MINUTE = 'minute';
    protected const UNIT_HOUR = 'hour';
    protected const UNIT_DAY = 'day';
    protected const UNIT_MONTH = 'month';
    protected const UNIT_YEAR = 'year';

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
    public function calculate($amount, $unit) : int
    {
        if( $amount == 0 )
        {
            return $this->unixTimestamp;
        }

        if( $amount > 0 )
        {
            $unit = $unit > 1 ? $unit : $this->getSingleUnit($unit);
            $modify = "+{$amount} {$unit}";
        }
        else
        {
            $unit = $days < -1 ? $unit : $this->getSingleUnit($unit);
            $modify = "{$amount} {$unit}";
        }

        return strtotime("{$this->buildMySqlDateTime()} {$modify}");
    }

    /**
     * @return string
     */
    protected function buildMySqlDateTime() : string
    {
        return date('Y-m-d H:i:s', $this->unixTimestamp);
    }

    /**
     * @param string $multiUnit
     * @return string
     */
    protected function getSingleUnit(string $multiUnit) : string
    {
        switch( $multiUnit )
        {
            case self::UNIT_SECONDS: return self::UNIT_SECOND;
            case self::UNIT_MINUTES: return self::UNIT_MINUTE;
            case self::UNIT_HOURS: return self::UNIT_HOUR;
            case self::UNIT_DAYS: return self::UNIT_DAY;
            case self::UNIT_MONTHS: return self::UNIT_MONTH;
            case self::UNIT_YEARS: return self::UNIT_YEAR;
        }
    }
}