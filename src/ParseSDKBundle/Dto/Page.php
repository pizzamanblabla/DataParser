<?php

namespace ParseSDKBundle\Dto;

class Page
{
    /**
     * @var Page
     */
    private $child;

    /**
     * @var string
     */
    private $name;

    /**
     * @var Route
     */
    private $route;

    /**
     * @var Pagination
     */
    private $pagination;

    /**
     * @return Page
     */
    public function getChild()
    {
        return $this->child;
    }

    /**
     * @param Page $child
     * @return Page
     */
    public function setChild($child)
    {
        $this->child = $child;
        return $this;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return Page
     */
    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return Route
     */
    public function getRoute()
    {
        return $this->route;
    }

    /**
     * @param Route $route
     * @return Page
     */
    public function setRoute($route)
    {
        $this->route = $route;
        return $this;
    }

    /**
     * @return Pagination
     */
    public function getPagination()
    {
        return $this->pagination;
    }

    /**
     * @param Pagination $pagination
     * @return Page
     */
    public function setPagination($pagination)
    {
        $this->pagination = $pagination;
        return $this;
    }
}