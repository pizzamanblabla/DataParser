<?php

namespace ParseSDKBundle\DataExtractor\String;

final class RegExp implements DataExtractorInterface
{
    /**
     * @var string
     */
    private $regExp;

    public function __construct(string $regExp)
    {
        $this->regExp = $regExp;
    }

    /**
     * {@inheritdoc}
     */
    public function extract($extractable)
    {
        if (!is_string($extractable)) {

        }

        return preg_match($this->regExp, $extractable, $match) ? $match[0] : '';
    }
}