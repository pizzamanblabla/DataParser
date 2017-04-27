<?php

namespace ParseSDKBundle\DataExtractor;

trait Decorator
{
    /**
     * @var DataExtractorInterface
     */
    private $decoratedDataExtractor;

    /**
     * @param DataExtractorInterface $decoratedDataExtractor
     * @return void
     */
    public function setDecoratedDataExtractor(DataExtractorInterface $decoratedDataExtractor)
    {
        $this->decoratedDataExtractor = $decoratedDataExtractor;
    }
}