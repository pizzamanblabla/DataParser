<?php

namespace ParseSDKBundle\Interaction\RemoteCall;

use ParseSDKBundle\Dto\Request\Query;
use Psr\Http\Message\ResponseInterface;

interface RemoteCallInterface
{
    /**
     * @param Query $query
     * @return ResponseInterface
     */
    public function call(Query $query): ResponseInterface;
}