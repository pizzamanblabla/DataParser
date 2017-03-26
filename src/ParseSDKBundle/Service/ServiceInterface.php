<?php

namespace ParseSDKBundle\Service;

use ParseSDKBundle\Dto\InternalRequestInterface;
use ParseSDKBundle\Dto\InternalResponseInterface;

interface ServiceInterface
{
    /**
     * @param InternalRequestInterface $request
     * @return InternalResponseInterface
     */
    public function behave(InternalRequestInterface $request): InternalResponseInterface;
}