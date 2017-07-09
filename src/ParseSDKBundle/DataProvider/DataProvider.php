<?php

namespace ParseSDKBundle\DataProvider;

use ParseSDKBundle\DataExtractor\Predefined\DataExtractorInterface;
use ParseSDKBundle\Dto\Request\Query;
use ParseSDKBundle\Interaction\RemoteCall\RemoteCallInterface;

final class DataProvider implements DataProviderInterface
{
    /**
     * @var RemoteCallInterface
     */
    private $remoteCall;

    /**
     * @var DataExtractorInterface
     */
    private $dataExtractor;

    /**
     * @param RemoteCallInterface $remoteCall
     * @param DataExtractorInterface $dataExtractor
     */
    public function __construct(RemoteCallInterface $remoteCall, DataExtractorInterface $dataExtractor)
    {
        $this->remoteCall = $remoteCall;
        $this->dataExtractor = $dataExtractor;
    }

    /**
     * {@inheritdoc}
     */
    public function provide(Query $query): array
    {
        $response = $this->remoteCall->call($query);

        return $this->dataExtractor->extract($response);
    }
}