<?php

namespace ParseSDKBundle\Dto\Request;

use JMS\Serializer\Annotation as Serializer;
use Symfony\Component\Validator\Constraints as Assert;

class RouteElement
{
    /**
     * @var string
     *
     * @Serializer\Type("string")
     * @Serializer\SerializedName("key")
     *
     * @Assert\NotBlank()
     */
    private $key;

    /**
     * @var string
     *
     * @Serializer\Type("string")
     * @Serializer\SerializedName("value")
     *
     * @Assert\NotBlank()
     */
    private $value;

    /**
     * @var RouteElement[]
     *
     * @Serializer\Type("array<ParseSDKBundle\Dto\Request\RouteElement>")
     * @Serializer\SerializedName("children")
     *
     * @Assert\Valid()
     */
    private $children;

    /**
     * @return string
     */
    public function getKey()
    {
        return $this->key;
    }

    /**
     * @param string $key
     * @return RouteElement
     */
    public function setKey($key)
    {
        $this->key = $key;
        return $this;
    }

    /**
     * @return string
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * @param string $value
     * @return RouteElement
     */
    public function setValue($value)
    {
        $this->value = $value;
        return $this;
    }

    /**
     * @return RouteElement[]
     */
    public function getChildren()
    {
        return $this->children;
    }

    /**
     * @param RouteElement[] $children
     * @return RouteElement
     */
    public function setChildren(array $children)
    {
        $this->children = $children;
        return $this;
    }
}