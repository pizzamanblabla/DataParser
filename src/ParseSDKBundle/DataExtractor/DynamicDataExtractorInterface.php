<?php

namespace ParseSDKBundle\DataExtractor;

interface DynamicDataExtractorInterface
{
    /**
     * @param mixed $extractable
     * @param mixed $route
     * @return mixed
     */
    public function extract($extractable, $route);
}