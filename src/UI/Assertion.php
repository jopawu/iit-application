<?php

namespace iit\Application\UI;

trait Assertion
{
    /**
     * @param object $instance
     * @param string[] $assertionClassnames
     * @throws \InvalidArgumentException
     */
    protected function assertInstanceOf($instance, array $assertionClassnames)
    {
        $instanceClassname = get_class($instance);

        foreach($assertionClassnames as $assertionClassname)
        {
            if( $instanceClassname == $assertionClassname )
            {
                return;
            }
        }

        $assertionClassnames = "\n".implode("\n", $assertionClassnames);

        throw new \InvalidArgumentException(
            "invalid ui module given: {$instanceClassname}, valid: {$assertionClassname}"
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