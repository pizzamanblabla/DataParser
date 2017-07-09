<?php

namespace ParseSDKBundle\DataExtractor\Configurable;

interface FactoryInterface
{
    /**
     * @param string $type
     * @return DataExtractorInterface
     */
    public function spawn(string $type): DataExtractorInterface;
}