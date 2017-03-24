<?php

namespace ParseSDKBundle\Dto;

class RouteElement
{
    /**
     * @var string
     */
    private $key;

    /**
     * @var string
     */
    private $value;

    /**
     * @var RouteElement[]
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