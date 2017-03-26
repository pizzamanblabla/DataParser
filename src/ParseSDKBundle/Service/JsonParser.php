<?php

namespace ParseSDKBundle\Service;

use ParseSDKBundle\Dto\InternalRequestInterface;
use ParseSDKBundle\Dto\InternalResponseInterface;

class JsonParser implements ServiceInterface
{
    /**
     * @param InternalRequestInterface $request
     * @return InternalResponseInterface
     */
    public function behave(InternalRequestInterface $request): InternalResponseInterface
    {
        // TODO: Implement behave() method.
    }
}