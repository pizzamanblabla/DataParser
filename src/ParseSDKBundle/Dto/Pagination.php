<?php

namespace ParseSDKBundle\Dto;

use JMS\Serializer\Annotation\SerializedName;
use JMS\Serializer\Annotation\Type;
use Symfony\Component\Validator\Constraints as Assert;

class Pagination
{
    /**
     * @var Route
     *
     * @Type("ParseSDKBundle\Dto\Route")
     * @SerializedName("route")
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