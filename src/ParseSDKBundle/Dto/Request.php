<?php

namespace ParseSDKBundle\Dto;

use ParseSDKBundle\Enumeration\SourceType;

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
     * @var SourceType
     */
    private $sourceType;

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

    /**
     * @return SourceType
     */
    public function getSourceType()
    {
        return $this->sourceType;
    }

    /**
     * @param SourceType $sourceType
     * @return Request
     */
    public function setSourceType($sourceType)
    {
        $this->sourceType = $sourceType;
        return $this;
    }
}