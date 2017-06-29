<?php

namespace ParseSDKBundle\Protocol;

use ParseSDKBundle\Dto\Request\InternalRequestInterface;

interface ProtocolInterface
{
    /**
     * @param InternalRequestInterface $request
     * @return InternalRequestInterface
     */
    public function getPage(InternalRequestInterface $request): InternalRequestInterface;
}