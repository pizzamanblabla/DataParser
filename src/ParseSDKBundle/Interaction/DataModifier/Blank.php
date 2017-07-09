<?php

namespace ParseSDKBundle\Interaction\DataModifier;

final class Blank implements DataModifierInterface
{
    /**
     * {@inheritdoc}
     */
    public function modify(string $modifiable): array
    {
        return $modifiable;
    }
}