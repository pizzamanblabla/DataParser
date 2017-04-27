<?php

namespace ParseSDKBundle\Dto\Request;

use JMS\Serializer\Annotation as Serializer;
use Symfony\Component\Validator\Constraints as Assert;

class Pagination
{
    /**
     * @var Route
     *
     * @Serializer\Type("ParseSDKBundle\Dto\Request\Route")
     * @Serializer\SerializedName("route")
     *
     * @Assert\NotBlank()
     * @Assert\Valid()
     */
    private $route;

    /**
     * @return Route
     */
    public function getRoute()
    {
        return $this->route;
    }

    /**
     * @param Route $route
     * @return Pagination
     */
    public function setRoute($route)
    {
        $this->route = $route;
        return $this;
    }

}