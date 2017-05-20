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
     *
     * @Assert\Valid()
     */
    private $group;

    /**
     * @var RouteElement[]
     *
     * @Serializer\Type("array<ParseSDKBundle\Dto\RouteElement>")
     * @Serializer\SerializedName("elements")
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
     * @return $this
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
     * @return $this
     */
    public function setParseElements(array $parseElements)
    {
        $this->parseElements = $parseElements;
        return $this;
    }
}