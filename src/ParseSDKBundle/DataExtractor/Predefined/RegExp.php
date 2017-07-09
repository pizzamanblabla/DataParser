<?php

namespace ParseSDKBundle\DataExtractor\Predefined;

use ParseSDKBundle\DataExtractor\Exception\DataExtractionException;
use ParseSDKBundle\Interaction\DataModifier\DataModifierInterface;
use ParseSDKBundle\Interaction\Sanitizer\SanitizerInterface;

final class RegExp implements DataExtractorInterface
{
    /**
     * @var DataModifierInterface
     */
    private $dataModifier;

    /**
     * @var SanitizerInterface
     */
    private $sanitizer;

    /**
     * @var string
     */
    private $regExp;

    /**
     * @param DataModifierInterface $dataModifier
     * @param SanitizerInterface $sanitizer
     * @param string $regExp
     */
    public function __construct(
        DataModifierInterface $dataModifier,
        SanitizerInterface $sanitizer,
        string $regExp
    ) {
        $this->dataModifier = $dataModifier;
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

        return $this->dataModifier->modify($this->sanitizer->sanitize($matched));
    }
}