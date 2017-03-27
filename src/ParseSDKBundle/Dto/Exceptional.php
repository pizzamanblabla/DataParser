<?php

namespace ParseSDKBundle\Dto;

use ParseSDKBundle\Enumeration\ResponseType;

trait Exceptional
{
    /**
     * @return ResponseType
     */
    public function obtainType()
    {
        return ResponseType::create(ResponseType::EXCEPTIONAL);
    }
}