<?php

namespace ParseSDKBundle\DataExtractor\Predefined\HttpResponse;

final class ContentData implements DataExtractorInterface
{
    /**
     * {@inheritdoc}
     */
    public function extract($data): array
    {
        return $data->getBody()->getContents();
    }
}