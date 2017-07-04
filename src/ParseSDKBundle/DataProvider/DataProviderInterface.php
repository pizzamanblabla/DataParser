<?php

namespace ParseSDKBundle\DataProvider;

use ParseSDKBundle\Dto\Request\Query;

interface DataProviderInterface
{
    /**
     * @param Query $query
     * @return mixed[]
     */
    public function provide(Query $query): array;
}