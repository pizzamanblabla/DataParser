<?php

namespace ParseSDKBundle\Transformer;

interface TransformerInterface
{
    /**
     * @param mixed $transformable
     * @return mixed
     */
    public function transform($transformable);
}