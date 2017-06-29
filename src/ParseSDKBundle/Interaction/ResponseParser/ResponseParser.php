<?php

namespace ParseSDKBundle\Interaction\ResponseParser;

use ParseSDKBundle\Dto\Response\InternalResponseInterface;
use Psr\Http\Message\ResponseInterface;

final class ResponseParser implements ResponseParserInterface
{

    /**
     * @param ResponseInterface $response
     * @return InternalResponseInterface
     */
    public function parse(ResponseInterface $response): InternalResponseInterface
    {
        // TODO: Implement parse() method.
    }
}