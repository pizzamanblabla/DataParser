<?php

namespace ParseSDKBundle\DataExtractor\Predefined\HttpResponse;

final class Headers implements DataExtractorInterface
{
    /**
     * {@inheritdoc}
     */
    public function extract($data): array
    {
        return $data->getHeaders();
    }
}