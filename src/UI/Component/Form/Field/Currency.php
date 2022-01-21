<?php

namespace iit\Application\UI\Component\Form\Field;

use iit\MLPV\Model\Datentypen\Geldbetrag;

/**
 * @author      Björn Heyser <info@bjoernheyser.de>
 */
class Currency extends FieldAbstract
{
    /**
     * @var Geldbetrag
     */
    protected $value = '';

    /**
     * @param Geldbetrag $value
     * @return Currency
     */
    public function withValue(Geldbetrag $value) : Currency
    {
        $clone = clone $this;
        $clone->value = $value;
        return $clone;
    }

    /**
     * @return Geldbetrag
     */
    public function getValue() : Geldbetrag
    {
        return $this->value;
    }

}
