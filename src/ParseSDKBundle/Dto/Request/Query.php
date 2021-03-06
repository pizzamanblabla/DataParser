<?php

namespace ParseSDKBundle\Dto\Request;

use JMS\Serializer\Annotation as Serializer;
use Symfony\Component\Validator\Constraints as Assert;

class Query
{
    /**
     * @var string
     *
     * @Serializer\Type("string")
     *
     * @Assert\NotNull()
     */
    private $method;

    /**
     * @var string[]
     *
     * @Serializer\Type("array")
     */
    private $parameters = [];

    /**
     * @var string
     *
     * @Serializer\Type("string")
     */
    private $payloadModifier;

    /**
     * @var string
     *
     * @Serializer\Type("string")
     */
    private $path;

    /**
     * @var string[]
     *
     * @Serializer\Type("array")
     */
    private $headers = [];

    /**
     * @var string
     *
     * @Serializer\Type("string")
     */
    private $expectedContentType;

    /**
     * @return string
     */
    public function getMethod()
    {
        return $this->method;
    }

    /**
     * @param string $method
     * @return Query
     */
    public function setMethod($method)
    {
        $this->method = $method;
        return $this;
    }

    /**
     * @return string[]
     */
    public function getParameters()
    {
        return $this->parameters;
    }

    /**
     * @param string[] $parameters
     * @return Query
     */
    public function setParameters(array $parameters)
    {
        $this->parameters = $parameters;
        return $this;
    }

    /**
     * @param string $proxy
     * @return Query
     */
    public function setProxy($proxy)
    {
        $this->proxy = $proxy;
        return $this;
    }

    /**
     * @return string
     */
    public function getPayloadModifier()
    {
        return $this->payloadModifier;
    }

    /**
     * @param string $payloadModifier
     * @return Query
     */
    public function setPayloadModifier($payloadModifier)
    {
        $this->payloadModifier = $payloadModifier;
        return $this;
    }

    /**
     * @return string
     */
    public function getPath()
    {
        return $this->path;
    }

    /**
     * @param string $path
     * @return Query
     */
    public function setPath($path)
    {
        $this->path = $path;
        return $this;
    }

    /**
     * @return string[]
     */
    public function getHeaders()
    {
        return $this->headers;
    }

    /**
     * @param string[] $headers
     * @return Query
     */
    public function setHeaders(array $headers)
    {
        $this->headers = $headers;
        return $this;
    }

    /**
     * @return string
     */
    public function getExpectedContentType()
    {
        return $this->expectedContentType;
    }

    /**
     * @param string $expectedContentType
     * @return Query
     */
    public function setExpectedContentType($expectedContentType)
    {
        $this->expectedContentType = $expectedContentType;
        return $this;
    }
}