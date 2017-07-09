<?php

namespace ParseSDKBundle\Interaction\RequestAssembler;

use GuzzleHttp\Psr7\Request;
use ParseSDKBundle\Dto\Request\Query;
use Psr\Http\Message\RequestInterface;

final class RequestAssembler implements RequestAssemblerInterface
{
    /**
     * {@inheritdoc}
     */
    public function assemble(Query $query): RequestInterface
    {
        return
            new Request(
                $query->getMethod(),
                $query->getPath(),
                $query->getHeaders(),
                $query->getParameters()
            );
    }
}