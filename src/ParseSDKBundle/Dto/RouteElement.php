<?php

namespace ParseSDKBundle\Dto;

use JMS\Serializer\Annotation\SerializedName;
use JMS\Serializer\Annotation\Type;
use Symfony\Component\Validator\Constraints as Assert;

class RouteElement
{
    /**
     * @var string
     *
     * @Type("string")
     * @SerializedName("key")
     *
     * @Assert\NotBlank()
     */
    private $key;

    /**
     * @var string
     *
     * @Type("string")
     * @SerializedName("value")
     *
     * @Assert\NotBlank()
     */
    private $value;

    /**
     * @var RouteElement[]
     *
     * @Type("array<ParseSDKBundle\Dto\RouteElement>")
     * @SerializedName("children")
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