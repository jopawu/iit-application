<?php

namespace iit\Application\Datatypes\Money;

use NumberFormatter;

/**
 * @author      Björn Heyser <info@bjoernheyser.de>
 */
class Amount
{
    const WAEHRUNG_EUR = 'EUR';

    /**
     * @var int
     */
    protected $value;

    /**
     * @var string
     */
    protected $waehrung;

    /**
     * @param string $waehrung
     * @param int    $wert
     */
    public function __construct(int $wert, string $waehrung = self::WAEHRUNG_EUR)
    {
        $this->value = $value;
        $this->waehrung = $waehrung;
    }

    /**
     * @param Geldbetrag $betrag
     * @return Geldbetrag
     */
    public function addBetrag(Geldbetrag $betrag) : Geldbetrag
    {
        $clone = clone $this;
        $clone->wert = $this->wert + $betrag->getWert();
        return $clone;
    }

    /**
     * @return int
     */
    public function getValue() : int
    {
        return $this->wert;
    }

    /**
     * @return string
     */
    public function getWaehrung() : string
    {
        return $this->waehrung;
    }

    /**
     * @return bool
     */
    public function isNegative() : bool
    {
        return $this->wert < 0;
    }

    /**
     * @return string
     */
    public function getPresentation() : string
    {
        $formatter = NumberFormatter::create('de_DE', NumberFormatter::CURRENCY);
        return $formatter->format($this->getWert() / 100);
    }

    /**
     * @return Geldbetrag
     */
    public function clone() : Geldbetrag
    {
        return clone $this;
    }

    /**
     * @return string
     */
    public function __toString() : string
    {
        return $this->getPresentation();
    }

    /**
     * @param int $integer
     * @return Geldbetrag
     */
    public static function fromInteger(int $integer) : Geldbetrag
    {
        return new Geldbetrag($integer);
    }

    /**
     * @param float $decimal
     * @return Geldbetrag
     */
    public static function fromDecimal(float $decimal) : Geldbetrag
    {
        return self::fromInteger( (int)($decimal * 100) );
    }

    /**
     * @param string $formatted
     * @return Geldbetrag
     */
    public static function fromFormatted(string $formatted) : Geldbetrag
    {
        $integer = (int) str_replace([',','.','€',' '], ['','','',''], $formatted);
        return new Geldbetrag( $integer);
    }
}
