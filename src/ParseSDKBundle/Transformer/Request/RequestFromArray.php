<?php

namespace ParseSDKBundle\Transformer\Request;

use ParseSDKBundle\Dto\Request;
use ParseSDKBundle\ObjectBuilder\ObjectBuilderInterface;
use ParseSDKBundle\Transformer\Exception\WrongInputTypeException;
use ParseSDKBundle\Transformer\TransformerInterface;

class RequestFromArray implements TransformerInterface
{
    /**
     * @var ObjectBuilderInterface
     */
    private $objectBuilder;

    /**
     * @param ObjectBuilderInterface $objectBuilder
     */
    public function __construct(ObjectBuilderInterface $objectBuilder)
    {
        $this->objectBuilder = $objectBuilder;
    }

    /**
     * @param mixed|array $transformable
     * @return mixed|Request
     * @throws WrongInputTypeException
     */
    public function transform($transformable)
    {
        if (!is_array($transformable)) {
            throw new WrongInputTypeException();
        }

        return $this->objectBuilder->build(Request::class, $transformable);
    }
}