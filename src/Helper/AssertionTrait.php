<?php

namespace iit\Application\Helper;

trait AssertionTrait
{
    /**
     * @param object $instance
     * @param string[] $assertionClassnames
     * @throws \InvalidArgumentException
     */
    protected function assertInstanceOf($instance, array $assertionClassnames)
    {
        foreach($assertionClassnames as $assertionClassname)
        {
            if( $instance instanceof $assertionClassname )
            {
                return;
            }
        }

        $assertionClassnames = "\n".implode("\n", $assertionClassnames);
        $instanceClassname = get_class($instance);

        throw new \InvalidArgumentException(
            "instance assertion failed, given: {$instanceClassname}, valid: {$assertionClassname}"
        );
    }

    /**
     * @param object $instances
     * @param string[] $assertionClassnames
     */
    protected function assertInstancesOf($instances, array $assertionClassnames)
    {
        foreach( $instances as $instance )
        {
            $this->assertInstanceOf($instance, $assertionClassnames);
        }
    }
}