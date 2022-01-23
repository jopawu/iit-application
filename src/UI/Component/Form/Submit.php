<?php

namespace iit\Application\UI\Component\Form;

use iit\Application\UI\ModuleAbstract;
use iit\Application\DI\Container as DIContainer;

/**
 * @author      Björn Heyser <info@bjoernheyser.de>
 */
class Submit extends ModuleAbstract
{
    /**
     * @var string
     */
    protected $command;

    /**
     * @var string
     */
    protected $label;

    /**
     * @param DIContainer $dic
     * @param string      $command
     * @param string      $label
     */
    public function __construct(DIContainer $dic, string $command, string $label)
    {
        parent::__construct($dic);
        $this->command = $command;
        $this->label = $label;
    }

    /**
     * @return string
     */
    public function getCommand() : string
    {
        return $this->command;
    }

    /**
     * @return string
     */
    public function getLabel() : string
    {
        return $this->label;
    }
}
