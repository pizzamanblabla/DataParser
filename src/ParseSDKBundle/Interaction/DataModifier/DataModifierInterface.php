<?php

namespace ParseSDKBundle\Interaction\DataModifier;

interface DataModifierInterface
{
    /**
     * @param string $modifiable
     * @return mixed
     */
    public function modify(string $modifiable);
}