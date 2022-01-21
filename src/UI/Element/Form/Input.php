<?php

namespace iit\Application\UI\Element\Form;

use iit\Application\UI\Element\ElementAbstract;
use iit\Application\DI\Container;

/**
 * @author      Björn Heyser <info@bjoernheyser.de>
 */
class Input extends ElementAbstract
{
    const TYPE_TEXT = 'text';
    const TYPE_NUMBER = 'number';

    /**
     * @var string
     */
    protected $id;

    /**
     * @var string
     */
    protected $type;

    /**
     * @var string
     */
    protected $name;

    /**
     * @var string
     */
    protected $value;

    /**
     * @var int
     */
    protected $size;

    /**
     * @var int
     */
    protected $maxlength;

    /**
     * @param Container $dic
     * @param string    $id
     * @param string    $name
     * @param string    $value
     */
    public function __construct(Container $dic, string $id, string $name, string $value)
    {
        parent::__construct($dic);

        $this->id = $id;
        $this->name = $name;
        $this->value = $value;

        $this->type = self::TYPE_TEXT;

        $this->size = null;
        $this->maxlength = null;
    }

    /**
     * @return string
     */
    public function getId() : string
    {
        return $this->id;
    }

    /**
     * @param string $type
     * @return Input
     */
    public function withType(string $type) : Input
    {
        $clone = clone $this;
        $clone->type = $type;
        return $clone;
    }

    /**
     * @return string
     */
    public function getType() : string
    {
        return $this->type;
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

    /**
     * @return int
     */
    public function getSize() : ?int
    {
        return $this->size;
    }

    /**
     * @return int
     */
    public function getMaxlength() : ?int
    {
        return $this->maxlength;
    }

    /**
     * @return Input
     */
    public function withTypeNumber() : Input
    {
        return $this->withType(self::TYPE_NUMBER);
    }
}
