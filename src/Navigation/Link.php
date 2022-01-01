<?php

namespace iit\Application\Navigation;

/**
 * @author      Björn Heyser <info@bjoernheyser.de>
 */
class Link
{
    /**
     * @var string
     */
    protected $script;

    /**
     * @var string
     */
    protected $controller;

    /**
     * @var string
     */
    protected $command;

    /**
     * @var array
     */
    protected $parameters;

    /**
     * @param string  $script
     * @param string $controller
     */
    public function __construct(string $script, string $controller)
    {
        $this->script = $script;
        $this->controller = $controller;
        $this->command = null;
        $this->parameters = [];
    }

    /**
     * @param string $controller
     * @return Link
     */
    public function withCtrl(string $controller) : Link
    {
        $clone = clone $this;
        $clone->controller = $controller;
        return $clone;
    }

    /**
     * @param string $command
     * @return Link
     */
    public function withCmd(string $command) : Link
    {
        $clone = clone $this;
        $clone->command = $command;
        return $clone;
    }

    /**
     * @param string $paramName
     * @param string $paramValue
     * @return Link
     */
    public function withAddedParam(string $paramName, string $paramValue) : Link
    {
        $clone = clone $this;
        $clone->parameters[$paramName] = $paramValue;
        return $clone;
    }

    /**
     * @param array $parameters
     * @return Link
     */
    public function withParameters(array $parameters) : Link
    {
        $clone = clone $this;
        $clone->parameters = $parameters;
        return $clone;
    }

    /**
     * @return string
     */
    protected function buildQueryString() : string
    {
        $parameters = [];

        if( $this->controller !== null && strlen($this->controller) )
        {
            $parameters[] = System::PARAM_CONTROLLER . '=' . $this->controller;
        }

        if( $this->command !== null && strlen($this->command) )
        {
            $parameters[] = System::PARAM_COMMAND . '=' . $this->command;
        }

        foreach( $this->parameters as $paramName => $paramValue )
        {
            $parameters[] = "{$paramName}={$paramValue}";
        }

        return implode('&', $parameters);
    }

    /**
     * @return string
     */
    public function __toString() : string
    {
        $queryString = $this->buildQueryString();

        if( strlen($queryString) )
        {
            return "{$this->script}?{$queryString}";
        }

        return $this->script;
    }
}
