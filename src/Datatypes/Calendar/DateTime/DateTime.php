<?php

namespace iit\Application\Datatypes\Calendar\DateTime;

use iit\Application\Datatypes\Calendar\Calculation\DateTimeCalculator;
use iit\Application\Datatypes\Calendar\Date\Date;
use iit\Application\Datatypes\Calendar\Traits\DateGetter;
use iit\Application\Datatypes\Calendar\Traits\DateTimeGetter;
use iit\Application\Datatypes\Calendar\Traits\UnixTimestamp;
use iit\Application\DI\Container;

/**
 * @author      Björn Heyser <info@bjoernheyser.de>
 */
class DateTime
{
    use DateGetter;
    use DateTimeGetter;

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
     * @param int $seconds
     * @return DateTime
     */
    public function withAddedSeconds(int $seconds) : DateTime
    {
        $clone = clone $this;

        $clone->unixTimestamp = $this->calculator->calculate(
            $seconds, DateTimeCalculator::UNIT_SECONDS
        );

        return $clone;
    }

    /**
     * @param int $minutes
     * @return DateTime
     */
    public function withAddedMinutes(int $minutes) : DateTime
    {
        $clone = clone $this;

        $clone->unixTimestamp = $this->calculator->calculate(
            $minutes, DateTimeCalculator::UNIT_MINUTES
        );

        return $clone;
    }

    /**
     * @param int $hours
     * @return DateTime
     */
    public function withAddedHours(int $hours) : DateTime
    {
        $clone = clone $this;

        $clone->unixTimestamp = $this->calculator->calculate(
            $hours, DateTimeCalculator::UNIT_HOURS
        );

        return $clone;
    }

    /**
     * @param int $days
     * @return DateTime
     */
    public function withAddedDays(int $days) : DateTime
    {
        $clone = clone $this;

        $clone->unixTimestamp = $this->calculator->calculate(
            $days, DateTimeCalculator::UNIT_DAYS
        );

        return $clone;
    }

    /**
     * @param int $months
     * @return DateTime
     */
    public function withAddedMonths(int $months) : DateTime
    {
        $clone = clone $this;

        $clone->unixTimestamp = $this->calculator->calculate(
            $months, DateTimeCalculator::UNIT_MONTHS
        );

        return $clone;
    }

    /**
     * @param int $years
     * @return DateTime
     */
    public function withAddedYears(int $years) : DateTime
    {
        $clone = clone $this;

        $clone->unixTimestamp = $this->calculator->calculate(
            $years, DateTimeCalculator::UNIT_YEARS
        );

        return $clone;
    }
}
