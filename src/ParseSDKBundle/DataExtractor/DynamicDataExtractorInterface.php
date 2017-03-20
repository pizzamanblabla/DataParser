<?php

namespace ParseSDKBundle\DataExtractor;

interface DynamicDataExtractorInterface
{
    /**
     * @param mixed $extractable
     * @param array $config
     * @return mixed
     */
    public function extract($extractable, $config);
}