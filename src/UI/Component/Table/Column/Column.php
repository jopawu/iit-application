<?php

namespace iit\Application\UI\Component\Table\Column;

use iit\Application\DI\Container;
use iit\Application\UI\Formatter\Formatter;
use iit\Application\UI\ModuleAbstract;

/**
 * @author      Björn Heyser <info@bjoernheyser.de>
 */
class Column extends ModuleAbstract
{
    /**
     * @var string
     */
    protected $identifier;

    /**
     * @var string
     */
    protected $label;

    /**
     * @var Formatter
     */
    protected $formatter;

    /**
     * @param Container $dic
     * @param string $identifier
     */
    public function __construct(Container $dic, string $identifier)
    {
        parent::__construct($dic);

        $this->identifier = $identifier;

        $this->label = '';
        $this->formatter = $this->dic->ui()->formatter()->plaintext();
    }

    /**
     * @return string
     */
    public function getIdentifier(): string
    {
        return $this->identifier;
    }

    /**
     * @return string
     */
    public function getLabel(): string
    {
        return $this->label;
    }

    /**
     * @return Formatter|\iit\Application\UI\Formatter\Plaintext
     */
    public function getFormatter()
    {
        return $this->formatter;
    }

    /**
     * @param string $label
     * @return mixed
     */
    public function withLabel(string $label): mixed
    {
        $clone = clone $this;
        $clone->label = $label;
        return $clone;
    }

    /**
     * @param Formatter $formatter
     * @return mixed
     */
    public function withFormatter(Formatter $formatter): mixed
    {
        $clone = clone $this;
        $clone->formatter = $formatter;
        return $clone;
    }
}