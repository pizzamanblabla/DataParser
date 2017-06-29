<?php

namespace ParseSDKBundle\Visitor;

use Symfony\Component\DependencyInjection\ContainerAwareTrait;

class Composite implements VisitorInterface
{
    use ContainerAwareTrait;

    public function __construct(array $t)
    {
    }

    public function visit()
    {
        // TODO: Implement visit() method.
    }
}