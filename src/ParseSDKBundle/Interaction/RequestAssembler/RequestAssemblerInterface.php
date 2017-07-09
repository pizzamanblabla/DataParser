<?php

namespace ParseSDKBundle\Interaction\RequestAssembler;

use ParseSDKBundle\Dto\Request\Query;
use Psr\Http\Message\RequestInterface;

interface RequestAssemblerInterface
{
    /**
     * @param Query $query
     * @return RequestInterface
     */
    public function assemble(Query $query): RequestInterface;
}