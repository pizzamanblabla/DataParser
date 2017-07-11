<?php

namespace ParseSDKBundle\DataProvider;

use ParseSDKBundle\Dto\Request\Query;
use ParseSDKBundle\Interaction\RemoteCall\RemoteCallInterface;

final class DataProvider implements DataProviderInterface
{
    /**
     * @var RemoteCallInterface
     */
    private $remoteCall;

    /**
     * @param RemoteCallInterface $remoteCall
     */
    public function __construct(RemoteCallInterface $remoteCall)
    {
        $this->remoteCall = $remoteCall;
    }

    /**
     * {@inheritdoc}
     */
    public function provide(Query $query): string
    {
        $response = $this->remoteCall->call($query);

        if ($response->getStatusCode() != 200) {
            throw new \Exception();
        }

        return $response->getBody()->getContents();
    }
}