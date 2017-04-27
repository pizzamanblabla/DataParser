<?php

namespace ParseSDKBundle\Dto\Request;

use JMS\Serializer\Annotation as Serializer;
use Symfony\Component\Validator\Constraints as Assert;

class Route
{
    /**
     * @var RouteElement
     *
     * @Serializer\Type("ParseSDKBundle\Dto\Request\RouteElement")
     * @Serializer\SerializedName("group")
     *
     * @Assert\Valid()
     */
    private $group;

    /**
     * @var RouteElement[]
     *
     * @Type("array<ParseSDKBundle\Dto\RouteElement>")
     * @SerializedName("elements")
     *
     * @Assert\NotBlank()
     * @Assert\Valid()
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