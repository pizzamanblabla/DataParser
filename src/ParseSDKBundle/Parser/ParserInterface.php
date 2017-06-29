<?php

namespace ParseSDKBundle\Parser;

use ParseSDKBundle\Dto\Request\InternalRequestInterface;
use ParseSDKBundle\Dto\Response\InternalResponseInterface;

interface ParserInterface
{
    /**
     * @param InternalRequestInterface $request
     * @return InternalResponseInterface
     */
    public function parse(InternalRequestInterface $request): InternalResponseInterface;
}