<?php

namespace ParseSDKBundle\DataExtractor\Predefined;

use ParseSDKBundle\DataExtractor\Exception\DataExtractionException;
use ParseSDKBundle\Interaction\PayloadModifier\PayloadModifierInterface;
use ParseSDKBundle\Interaction\Sanitizer\SanitizerInterface;

final class RegExp implements DataExtractorInterface
{
    /**
     * @var PayloadModifierInterface
     */
    private $payloadModifier;

    /**
     * @var SanitizerInterface
     */
    private $sanitizer;

    /**
     * @var string
     */
    private $regExp;

    /**
     * @param PayloadModifierInterface $payloadModifier
     * @param SanitizerInterface $sanitizer
     * @param string $regExp
     */
    public function __construct(
        PayloadModifierInterface $payloadModifier,
        SanitizerInterface $sanitizer,
        string $regExp
    ) {
        $this->payloadModifier = $payloadModifier;
        $this->sanitizer = $sanitizer;
        $this->regExp = $regExp;
    }

    /**
     * {@inheritdoc}
     */
    public function extract($extractable): array
    {
        if (!is_string($extractable)) {
            throw new DataExtractionException();
        }

        $matched = preg_match($this->regExp, $extractable, $match) ? $match[0] : '';

        return $this->payloadModifier->modify($this->sanitizer->sanitize($matched));
    }
}