<?php

namespace ParseSDKBundle\Transformer\Response;

use JMS\Serializer\Serializer;
use ParseSDKBundle\Enumeration\ResultType;

class TransformerFactory implements TransformerFactoryInterface
{
    /**
     * {@inheritdoc}
     */
    public function spawn(ResultType $type)
    {

    }
}