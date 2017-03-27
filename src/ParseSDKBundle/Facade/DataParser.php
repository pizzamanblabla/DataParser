<?php

namespace ParseSDKBundle\Facade;

use ParseSDKBundle\Transformer\TransformerInterface;

class DataParser
{
    /**
     * @var TransformerInterface
     */
    private $transformer;

    /**
     * @param TransformerInterface $transformer
     */
    public function __construct(TransformerInterface $transformer)
    {
        $this->transformer = $transformer;
    }
}