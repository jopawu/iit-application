<?php

namespace iit\Application\UI\Element\Form;

use iit\Application\UI\Element\ElementAbstract;
use iit\Application\DI\Container;

/**
 * @author      Björn Heyser <info@bjoernheyser.de>
 */
class Hidden extends ElementAbstract
{
    /**
     * @var string
     */
    protected $name;

    /**
     * @var string
     */
    protected $value;

    /**
     * @param Container $dic
     * @param string    $name
     * @param string    $value
     */
    public function __construct(Container $dic, string $name, string $value)
    {
        parent::__construct($dic);
        $this->name = $name;
        $this->value = $value;
    }

    /**
     * @return string
     */
    public function getName() : string
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public function getValue() : string
    {
        return $this->value;
    }
}
