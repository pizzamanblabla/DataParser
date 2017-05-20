<?php

namespace ParseSDKBundle\Dto\Request;

use JMS\Serializer\Annotation as Serializer;
use Symfony\Component\Validator\Constraints as Assert;

class Page
{
    /**
     * @var Page
     *
     * @Serializer\Type("ParseSDKBundle\Dto\Request\Page")
     *
     * @Assert\Valid()
     */
    private $child;

    /**
     * @var string
     *
     * @Serializer\Type("string")
     *
     * @Assert\NotBlank()
     */
    private $name;

    /**
     * @var Route
     *
     * @Serializer\Type("ParseSDKBundle\Dto\Request\Route")
     *
     * @Assert\NotBlank()
     * @Assert\Valid()
     */
    private $route;

    /**
     * @var Pagination
     *
     * @Serializer\Type("ParseSDKBundle\Dto\Request\Pagination")
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