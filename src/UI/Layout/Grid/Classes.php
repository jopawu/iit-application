<?php

namespace iit\Application\UI\Layout\Grid;

/**
 * @author      Björn Heyser <info@bjoernheyser.de>
 */
class Classes
{
    const SCREEN_XS = 'col-';
    const SCREEN_SM = 'col-sm-';
    const SCREEN_MD = 'col-md-';
    const SCREEN_LG = 'col-lg-';
    const SCREEN_XL = 'col-xl-';
    const SCREEN_XXL = 'col-xxl-';

    /**
     * @var string[]
     */
    protected static $validScreens = [
        self::SCREEN_XS, self::SCREEN_SM, self::SCREEN_MD,
        self::SCREEN_LG, self::SCREEN_XL, self::SCREEN_XXL
    ];
}
