<?php

namespace ParseSDKBundle\DataExtractor\Configurable;

use ParseSDKBundle\Dto\Request\Route;

interface DataExtractorInterface
{
    /**
     * @param mixed $extractable
     * @param Route $route
     * @return mixed[]
     */
    public function extract($extractable, Route $route);
}