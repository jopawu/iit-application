<?php

namespace iit\Application\Datatypes\Money\Currency;

/**
 * @author      Björn Heyser <info@bjoernheyser.de>
 */
class Currency
{
    /**
     * @var string
     */
    protected $type;

    /**
     * @var string
     */
    protected $code;

    /**
     * @var string
     */
    protected $unitName;

    /**
     * @var string
     */
    protected $unitSymbol;

    /**
     * @var bool
     */
    protected $symbolFirst;

    /**
     * @var string
     */
    protected $subunitName;

    /**
     * @var int
     */
    protected $subunitFactor;

    /**
     * @var string
     */
    protected $decimalMark;

    /**
     * @var string
     */
    protected $thousandsSeparator;

    /**
     * @param string $type
     * @param array $properties
     */
    public function __construct(string $type, array $properties)
    {
        $this->type = (string)$type;
        $this->code = (string)$properties['iso_code'];

        $this->unitName = (string)$properties['name'];
        $this->unitSymbol = (string)$properties['symbol'];
        $this->symbolFirst = $properties['symbol_first'] == 'true' ? true : false;

        $this->subunitName = (string)$properties['subunit'];
        $this->subunitFactor = (int)$properties['subunit_to_unit'];

        $this->decimalMark = (string)$properties['decimal_mark'];
        $this->thousandsSeparator = (string)$properties['thousands_separator'];

        /*
        $properties['iso_code'];
        $properties['iso_numeric'];
        $properties['priority'];
        $properties['name'];
        $properties['symbol_first'];
        $properties['symbol'];
        $properties['html_entity'];
        $properties['alternate_symbols'];
        $properties['subunit'];
        $properties['subunit_to_unit'];
        $properties['decimal_mark'];
        $properties['thousands_separator'];
        $properties['smallest_denomination'];

        $properties['format'];
        $properties['disambiguate_symbol'];
        */
    }

    /**
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * @return string
     */
    public function getCode(): string
    {
        return $this->code;
    }

    /**
     * @return string
     */
    public function getUnitName(): string
    {
        return $this->unitName;
    }

    /**
     * @return string
     */
    public function getUnitSymbol(): string
    {
        return $this->unitSymbol;
    }

    /**
     * @return bool
     */
    public function isSymbolFirst(): bool
    {
        return $this->symbolFirst;
    }

    /**
     * @return string
     */
    public function getSubunitName(): string
    {
        return $this->subunitName;
    }

    /**
     * @return int
     */
    public function getSubunitFactor(): int
    {
        return $this->subunitFactor;
    }

    /**
     * @return string
     */
    public function getDecimalMark(): string
    {
        return $this->decimalMark;
    }

    /**
     * @return string
     */
    public function getThousandsSeparator(): string
    {
        return $this->thousandsSeparator;
    }
}
