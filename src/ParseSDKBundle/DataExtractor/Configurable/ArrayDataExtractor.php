<?php

namespace ParseSDKBundle\DataExtractor\Configurable;

use ParseSDKBundle\Dto\Request\Route;

final class ArrayDataExtractor implements DataExtractorInterface
{
    /**
     * {@inheritdoc}
     */
    public function extract($extractable, Route $route)
    {
        if (!is_array($extractable)) {

        }
    }
}