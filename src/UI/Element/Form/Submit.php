<?php

namespace iit\Application\UI\Element\Form;

use iit\Application\UI\ModuleAbstract;

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
     * @param string $command
     * @param string $label
     */
    public function __construct(string $command, string $label)
    {
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
