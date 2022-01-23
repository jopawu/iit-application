<?php

namespace iit\Application\UI\Element\Form\Select;

use iit\Application\UI\ModuleAbstract;
use iit\Application\Helper\DicTrait;
use iit\Application\DI\Container;

/**
 * @author      Björn Heyser <info@bjoernheyser.de>
 */
class Menu extends ModuleAbstract
{
    use DicTrait;

    /**
     * @var string
     */
    protected $id;

    /**
     * @var string
     */
    protected $name;

    /**
     * @var Option[]
     */
    protected $options;

    /**
     * @param Container $dic
     * @param string    $id
     * @param string    $name
     * @param Option[]  $options
     */
    public function __construct(Container $dic, string $id, string $name, array $options)
    {
        parent::__construct($dic);
        $this->id = $id;
        $this->name = $name;
        $this->options = $options;
    }

    /**
     * @return string
     */
    public function getId() : string
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getName() : string
    {
        return $this->name;
    }

    /**
     * @return Option[]
     */
    public function getOptions() : array
    {
        return $this->options;
    }
}
