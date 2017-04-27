<?php

namespace ParseSDKBundle\Dto\Response;

use ParseSDKBundle\Enumeration\ResponseType;

interface InternalResponseInterface
{
    /**
     * @return ResponseType
     */
    public function obtainType();
}