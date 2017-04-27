<?php

namespace ParseSDKBundle\Service;

use ParseSDKBundle\Dto\Request\InternalRequestInterface;
use ParseSDKBundle\Dto\Response\InternalResponseInterface;

interface ServiceInterface
{
    /**
     * @param InternalRequestInterface $request
     * @return InternalResponseInterface
     */
    public function behave(InternalRequestInterface $request): InternalResponseInterface;
}