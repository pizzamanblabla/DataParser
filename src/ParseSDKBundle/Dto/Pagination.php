<?php

namespace ParseSDKBundle\Dto;

class Pagination
{
    /**
     * @var Route
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