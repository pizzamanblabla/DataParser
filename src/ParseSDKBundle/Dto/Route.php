<?php

namespace ParseSDKBundle\Dto;

class Route
{
    /**
     * @var RouteElement
     */
    private $group;

    /**
     * @var RouteElement[]
     */
    private $parseElements;

    /**
     * @return RouteElement
     */
    public function getGroup()
    {
        return $this->group;
    }

    /**
     * @param RouteElement $group
     * @return Route
     */
    public function setGroup($group)
    {
        $this->group = $group;
        return $this;
    }

    /**
     * @return RouteElement[]
     */
    public function getParseElements()
    {
        return $this->parseElements;
    }

    /**
     * @param RouteElement[] $parseElements
     * @return Route
     */
    public function setParseElements(array $parseElements)
    {
        $this->parseElements = $parseElements;
        return $this;
    }
}