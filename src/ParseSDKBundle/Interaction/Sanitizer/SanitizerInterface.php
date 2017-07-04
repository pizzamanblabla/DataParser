<?php

namespace ParseSDKBundle\Interaction\Sanitizer;

interface SanitizerInterface
{
    /**
     * @param string $data
     * @return string
     */
    public function sanitize(string $data): string;
}