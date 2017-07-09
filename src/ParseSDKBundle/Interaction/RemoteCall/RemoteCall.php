<?php

namespace ParseSDKBundle\Interaction\RemoteCall;

use GuzzleHttp\ClientInterface;
use ParseSDKBundle\Dto\Request\Query;
use ParseSDKBundle\Interaction\RequestAssembler\RequestAssemblerInterface;
use Psr\Http\Message\ResponseInterface;

final class RemoteCall implements RemoteCallInterface
{
    /**
     * @var ClientInterface
     */
    private $client;

    /**
     * @var RequestAssemblerInterface
     */
    private $requestAssembler;

    /**
     * @param ClientInterface $client
     * @param RequestAssemblerInterface $requestAssembler
     */
    public function __construct(ClientInterface $client, RequestAssemblerInterface $requestAssembler)
    {
        $this->client = $client;
        $this->requestAssembler = $requestAssembler;
    }

    /**
     * {@inheritdoc}
     */
    public function call(Query $query): ResponseInterface
    {
        return $this->client->send($this->requestAssembler->assemble($query));
    }
}