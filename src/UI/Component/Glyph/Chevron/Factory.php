<?php

namespace iit\Application\UI\Component\Glyph\Chevron;

use iit\Application\DI\Container;

/**
 * @author      Björn Heyser <info@bjoernheyser.de>
 */
class Factory
{
    /**
     * @var Container
     */
    protected $dic;

    /**
     * @param Container $dic
     */
    public function __construct(Container $dic)
    {
        $this->dic = $dic;
    }

    /**
     * @return Down
     */
    public function down(): Down
    {
        return new Down($this->dic);
    }

    /**
     * @return Up
     */
    public function up(): Up
    {
        return new Up($this->dic);
    }

    /**
     * @return Left
     */
    public function left(): Left
    {
        return new Left($this->dic);
    }

    /**
     * @return Right
     */
    public function right(): Right
    {
        return new Right($this->dic);
    }
}