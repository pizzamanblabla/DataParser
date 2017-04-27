<?php

namespace ParseSDKBundle\Dto\Response;

use ParseSDKBundle\Enumeration\ResponseType;

trait Successful
{
    /**
     * @return ResponseType
     */
    public function obtainType()
    {
        return ResponseType::create(ResponseType::SUCCESSFUL);
    }
}