<?php

namespace ParseSDKBundle\DataExtractor;

interface DataExtractorInterface
{
    /**
     * @param mixed $extractable
     * @return mixed
     */
    public function extract($extractable);
}