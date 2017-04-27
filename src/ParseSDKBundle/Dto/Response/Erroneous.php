<?php

namespace ParseSDKBundle\Dto\Response;

use ParseSDKBundle\Enumeration\ResponseType;

trait Erroneous
{
    /**
     * @return ResponseType
     */
    public function obtainType()
    {
        return ResponseType::create(ResponseType::ERRONEOUS);
    }
}