<?php

namespace ParseSDKBundle\Interaction\PayloadModifier;

interface PayloadModifierInterface
{
    /**
     * @param string $modifiable
     * @return mixed
     */
    public function modify(string $modifiable);
}