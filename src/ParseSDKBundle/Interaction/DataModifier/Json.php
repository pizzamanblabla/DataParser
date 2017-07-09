<?php

namespace ParseSDKBundle\Interaction\DataModifier;

final class Json implements DataModifierInterface
{
    /**
     * {@inheritdoc}
     */
    public function modify(string $modifiable)
    {
        $modified =  json_decode($modifiable, 1);

        return is_array($modified) ? $modified : [];
    }
}