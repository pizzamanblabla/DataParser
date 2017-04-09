<?php

namespace ParseSDKBundle\Transformer\Response;

use ParseSDKBundle\Enumeration\ResultType;
use ParseSDKBundle\Transformer\TransformerInterface;

interface TransformerFactoryInterface
{
    /**
     * @param ResultType $type
     * @return TransformerInterface
     */
    public function spawn(ResultType $type);
}