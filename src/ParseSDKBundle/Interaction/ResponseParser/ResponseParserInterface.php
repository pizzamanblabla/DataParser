<?php

namespace ParseSDKBundle\Interaction\ResponseParser;

use ParseSDKBundle\Dto\Response\InternalResponseInterface;
use Psr\Http\Message\ResponseInterface;

interface ResponseParserInterface
{
    /**
     * @param ResponseInterface $response
     * @return InternalResponseInterface
     */
    public function parse(ResponseInterface $response): InternalResponseInterface;
}