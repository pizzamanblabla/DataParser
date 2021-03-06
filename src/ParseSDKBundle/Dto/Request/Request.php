<?php

namespace ParseSDKBundle\Dto\Request;

use ParseSDKBundle\Enumeration\SourceType;
use JMS\Serializer\Annotation as Serializer;
use Symfony\Component\Validator\Constraints as Assert;

class Request
{
    /**
     * @var Page[]
     *
     * @Serializer\Type("array<ParseSDKBundle\Dto\Request\Page>")
     *
     * @Assert\NotBlank()
     * @Assert\Valid()
     */
    private $pages;

    /**
     * @var string
     *
     * @Serializer\Type("string")
     *
     * @Assert\NotBlank()
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