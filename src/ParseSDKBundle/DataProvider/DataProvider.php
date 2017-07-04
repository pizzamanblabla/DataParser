<?php

namespace ParseSDKBundle\DataProvider;

use ParseSDKBundle\Dto\Request\Query;

final class DataProvider implements DataProviderInterface
{
    private $remoteCall;

    private $dataExtractor;

    /**
     * {@inheritdoc}
     */
    public function provide(Query $query): array
    {
        // TODO: Implement provide() method.
    }
}