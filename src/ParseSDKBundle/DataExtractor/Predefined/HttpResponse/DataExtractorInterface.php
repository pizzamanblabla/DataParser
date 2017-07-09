<?php

namespace ParseSDKBundle\DataExtractor\Predefined\HttpResponse;

use ParseSDKBundle\DataExtractor\Predefined\DataExtractorInterface as BaseDataExtractorInterface;
use Psr\Http\Message\ResponseInterface;

interface DataExtractorInterface extends BaseDataExtractorInterface
{
    /**
     * @param mixed|ResponseInterface $data
     * @return mixed[]
     */
    public function extract($data): array;
}