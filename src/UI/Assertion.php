<?php

namespace iit\Application\UI;

trait Assertion
{
    /**
     * @param object $instance
     * @param string[] $assertionClassnames
     * @throws \InvalidArgumentException
     */
    protected function assertInstanceOf($instance, $assertionClassnames)
    {
        $instanceClassname = get_class($instance);

        foreach($assertionClassnames as $assertionClassname)
        {
            if( $instanceClassname == $assertionClassname )
            {
                return;
            }
        }

        throw new \InvalidArgumentException(
            "invalid ui module given: {$instanceClassname}, required one: {$assertionClassname}"
        );
    }
}