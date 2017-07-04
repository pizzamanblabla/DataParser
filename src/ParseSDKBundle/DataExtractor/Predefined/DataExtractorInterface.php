<?php

namespace ParseSDKBundle\DataExtractor\Predefined;

interface DataExtractorInterface
{
    /**
     * @param mixed $data
     * @return mixed[]
     */
    public function extract($data): array;
}