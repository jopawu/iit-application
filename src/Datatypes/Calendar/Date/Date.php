<?php

namespace iit\Application\Datatypes\Calendar\Date;

use iit\Application\Datatypes\Calendar\Calculation\DateTimeCalculator;
use iit\Application\Datatypes\Calendar\Traits\DateGetter;
use iit\Application\Datatypes\Calendar\Traits\UnixTimestamp;
use iit\Application\DI\Container;
use InvalidArgumentException;

/**
 * @author      Björn Heyser <info@bjoernheyser.de>
 */
class Date
{
    use DateGetter;

    /**
     * @var int
     */
    protected $unixTimestamp;

    /**
     * @var DateTimeCalculator
     */
    protected $calculator;

    /**
     * @param Container $dic
     * @param int $unixTimestamp
     */
    public function __construct(Container $dic, int $unixTimestamp)
    {
        $this->unixTimestamp = $this->ensureUnixTimestampStartOfDay($unixTimestamp);

        $this->calculator = $dic->datatypes()->calendar()->calculation()->datetime(
            $this->unixTimestamp
        );
    }

    /**
     * @return int
     */
    public function getUnixTimestamp() : int
    {
        return $this->unixTimestamp;
    }

    /**
     * @param int $days
     * @return Date
     */
    public function withAddedDays(int $days) : Date
    {
        $clone = clone $this;

        $clone->unixTimestamp = $this->calculator->calculate(
            $days, DateTimeCalculator::UNIT_DAYS
        );

        return $clone;
    }

    /**
     * @param int $months
     * @return Date
     */
    public function withAddedMonths(int $months) : Date
    {
        $clone = clone $this;

        $clone->unixTimestamp = $this->calculator->calculate(
            $months, DateTimeCalculator::UNIT_MONTHS
        );

        return $clone;
    }

    /**
     * @param int $years
     * @return Date
     */
    public function withAddedYears(int $years) : Date
    {
        $clone = clone $this;

        $clone->unixTimestamp = $this->calculator->calculate(
            $years, DateTimeCalculator::UNIT_YEARS
        );

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
