<?php

namespace ParseSDKBundle\DataProvider;

use ParseSDKBundle\Dto\Request\Query;

interface DataProviderInterface
{
    /**
     * @param Query $query
     * @return string
     */
    public function provide(Query $query): string;
}