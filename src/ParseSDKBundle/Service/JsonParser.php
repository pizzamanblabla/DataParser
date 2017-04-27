<?php

namespace ParseSDKBundle\Service;


use ParseSDKBundle\Dto\Request\InternalRequestInterface;
use ParseSDKBundle\Dto\Response\InternalResponseInterface;

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