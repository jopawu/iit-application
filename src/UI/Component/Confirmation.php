<?php

namespace iit\Application\UI\Component;

use iit\Application\UI\ModuleAbstract;
use iit\Application\Navigation\Link;

/**
 * @author      Björn Heyser <info@bjoernheyser.de>
 */
class Confirmation extends ModuleAbstract
{
    /**
     * @var ModuleAbstract[]
     */
    protected $contents;

    /**
     * @var Link
     */
    protected $confirmLink;

    /**
     * @var string
     */
    protected $confirmLabel;

    /**
     * @var Link
     */
     protected $cancelLink;

    /**
     * @var string
     */
     protected $cancelLabel;

    /**
     * @return ModuleAbstract[]
     */
    public function getContents() : array
    {
        return $this->contents;
    }

    /**
     * @return Link
     */
    public function getConfirmLink() : Link
    {
        return $this->confirmLink;
    }

    /**
     * @return string
     */
    public function getConfirmLabel() : string
    {
        return $this->confirmLabel;
    }

    /**
     * @return Link
     */
    public function getCancelLink() : Link
    {
        return $this->cancelLink;
    }

    /**
     * @return string
     */
    public function getCancelLabel() : string
    {
        return $this->cancelLabel;
    }

    /**
     * @param ModuleAbstract $content
     * @return Confirmation
     */
    public function withAddedContent(ModuleAbstract $content) : Confirmation
    {
        $clone = clone $this;
        $clone->contents[] = $content;
        return $clone;
    }

    /**
     * @param Link   $confirmLink
     * @param string $confirmLabel
     * @return Confirmation
     */
    public function withConfirmButton(Link $confirmLink, string $confirmLabel) : Confirmation
    {
        $clone = clone $this;
        $clone->confirmLink = $confirmLink;
        $clone->confirmLabel = $confirmLabel;
        return $clone;
    }

    /**
     * @param Link   $cancelLink
     * @param string $cancelLabel
     * @return Confirmation
     */
    public function withCancelButton(Link $cancelLink, string $cancelLabel) : Confirmation
    {
        $clone = clone $this;
        $clone->cancelLink = $cancelLink;
        $clone->cancelLabel = $cancelLabel;
        return $clone;
    }
}
