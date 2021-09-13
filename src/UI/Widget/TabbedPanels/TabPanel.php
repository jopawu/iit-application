<?php

namespace iit\Application\UI\Widget\TabbedPanels;

/**
 * @author      Björn Heyser <info@bjoernheyser.de>
 */
class TabPanel
{
    /**
     * @var string
     */
    protected $href;

    /**
     * @var string
     */
    protected $label;

    /**
     * Tab constructor.
     * @param string $href
     * @param string $label
     */
    public function __construct($href, $label)
    {
        $this->href = $href;
        $this->label = $label;
    }

    /**
     * @return array
     */
    public function toArray()
    {
        return [
            'href' => $this->href,
            'label' => $this->label
        ];
    }
}
