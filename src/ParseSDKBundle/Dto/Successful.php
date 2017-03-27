<?php

namespace ParseSDKBundle\Dto;

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