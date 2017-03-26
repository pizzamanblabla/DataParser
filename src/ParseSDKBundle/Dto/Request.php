<?php

namespace ParseSDKBundle\Dto;

class Request
{
    /**
     * @var Page[]
     */
    private $pages;

    /**
     * @var string
     */
    private $rootResource;

    /**
     * @return Page[]
     */
    public function getPages()
    {
        return $this->pages;
    }

    /**
     * @param Page[] $pages
     * @return Request
     */
    public function setPages($pages)
    {
        $this->pages = $pages;
        return $this;
    }

    /**
     * @return string
     */
    public function getRootResource()
    {
        return $this->rootResource;
    }

    /**
     * @param string $rootResource
     * @return Request
     */
    public function setRootResource($rootResource)
    {
        $this->rootResource = $rootResource;
        return $this;
    }
}