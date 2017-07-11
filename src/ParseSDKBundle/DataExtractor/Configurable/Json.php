<?php

namespace ParseSDKBundle\DataExtractor\Configurable;

use ParseSDKBundle\DataExtractor\Exception\DataExtractionException;
use ParseSDKBundle\Dto\Request\Route;

final class Json implements DataExtractorInterface
{
    /**
     * @var DataExtractorInterface
     */
    private $decoratedDataExtractor;

    /**
     * @param DataExtractorInterface $decoratedDataExtractor
     */
    public function __construct(DataExtractorInterface $decoratedDataExtractor)
    {
        $this->decoratedDataExtractor = $decoratedDataExtractor;
    }

    /**
     * {@inheritdoc}
     */
    public function extract($extractable, Route $route)
    {
        $transformed = json_decode($extractable, 1);

        if (!is_array($transformed)) {
            throw new DataExtractionException('Input data is not json');
        }

        return $this->decoratedDataExtractor->extract($transformed, $route);
    }
}