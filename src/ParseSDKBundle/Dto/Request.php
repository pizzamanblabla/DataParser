<?php

namespace ParseSDKBundle\Dto;

class Request
{
    /**
     * @var Page[]
     */
    private $pages;

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
}