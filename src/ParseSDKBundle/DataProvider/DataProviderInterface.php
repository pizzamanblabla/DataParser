<?php

namespace ParseSDKBundle\DataProvider;

interface DataProviderInterface
{
    /**
     * @param string $sourcePath
     * @param mixed[] $params
     * @return mixed[]
     */
    public function provide(string $sourcePath, array $params = []): array;
}