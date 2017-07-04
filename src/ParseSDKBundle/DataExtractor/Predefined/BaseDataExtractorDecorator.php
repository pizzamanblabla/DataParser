<?php

namespace ParseSDKBundle\DataExtractor\Predefined;

abstract class BaseDataExtractorDecorator implements DataExtractorInterface
{
    /**
     * @var DataExtractorInterface
     */
    protected $dataExtractor;

    /**
     * @param DataExtractorInterface $dataExtractor
     */
    public function __construct(DataExtractorInterface $dataExtractor)
    {
        $this->dataExtractor = $dataExtractor;
    }
}