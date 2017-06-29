<?php

namespace ParseSDKBundle\DataExtractor\String;

interface DataExtractorInterface
{
    /**
     * @param mixed $extractable
     * @return string
     */
    public function extract($extractable);
}