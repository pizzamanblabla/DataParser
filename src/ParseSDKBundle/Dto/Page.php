<?php

namespace ParseSDKBundle\Dto;

use JMS\Serializer\Annotation\SerializedName;
use JMS\Serializer\Annotation\Type;
use Symfony\Component\Validator\Constraints as Assert;

class Page
{
    /**
     * @var Page
     *
     * @Type("ParseSDKBundle\Dto\Page")
     * @SerializedName("child")
     *
     * @Assert\Valid()
     */
    private $child;

    /**
     * @var string
     *
     * @Type("string")
     * @SerializedName("name")
     *
     * @Assert\NotBlank()
     */
    private $name;

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
     * @var Pagination
     *
     * @Type("ParseSDKBundle\Dto\Pagination")
     * @SerializedName("pagination")
     *
     * @Assert\Valid()
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