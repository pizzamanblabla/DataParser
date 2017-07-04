<?php

namespace ParseSDKBundle\Interaction\PayloadModifier;

final class Blank implements PayloadModifierInterface
{
    /**
     * {@inheritdoc}
     */
    public function modify(string $modifiable): array
    {
        return $modifiable;
    }
}