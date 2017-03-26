<?php

namespace ParseSDKBundle\Dto;

use ParseSDKBundle\Enumeration\ResponseType;

interface InternalResponseInterface
{
    /**
     * @return ResponseType
     */
    public function obtainType();
}