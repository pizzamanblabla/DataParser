<?php

namespace ParseSDKBundle\Dto;

use JMS\Serializer\Annotation\SerializedName;
use JMS\Serializer\Annotation\Type;
use Symfony\Component\Validator\Constraints as Assert;

class Route
{
    /**
     * @var RouteElement
     *
     * @Type("ParseSDKBundle\Dto\RouteElement")
     * @SerializedName("group")
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