<?php

namespace ParseSDKBundle\Service;

use ParseSDKBundle\DataExtractor\DynamicDataExtractorInterface;
use ParseSDKBundle\Dto\InternalRequestInterface;
use ParseSDKBundle\Dto\InternalResponseInterface;
use ParseSDKBundle\Dto\Page;
use ParseSDKBundle\Dto\Request;

class WebsiteParser implements ServiceInterface
{
    /**
     * @var DynamicDataExtractorInterface
     */
    private $dataExtractor;

    private $protocol;

    /**
     * @param InternalRequestInterface|Request $request
     * @return InternalResponseInterface
     */
    public function behave(InternalRequestInterface $request): InternalResponseInterface
    {

        $parsed = array_map(
            function(Page $page) use ($request) {
                return $this->parseRecursively(
                    $page,
                    $request->getRootResource()
                );
            },
            $request->getPages()
        );
    }

    /**
     * @param Page $page
     * @param string|null $rootResource
     * @param string $partUrl
     * @return array
     */
    private function parseRecursively(Page $page, string $rootResource, string $partUrl = null): array
    {
        $parsed = [];

        if (!is_null($partUrl)) {
            $pageUrl = $this->resolveUrl($partUrl, $rootResource);
        } else {
            $pageUrl = $rootResource;
        }

        $html = $this->getPage($pageUrl);
        $parsed[$page->getName()] = $this->dataExtractor->extract($html, $page->getRoute());

        if (!empty($page->getChild())) {
            foreach ($parsed[$page->getName()] as $key => $element) {
                $child = $this->parseRecursively($page->getChild(), $rootResource, $element['url']);

                if (
                    $page->getName() == $page->getChild()->getName() &&
                    array_key_exists($page->getName(), $child)
                ) {
                    $child = $child[$page->getName()][0];
                }

                $parsed[$page->getName()][$key] =
                    array_merge(
                        $parsed[$page->getName()][$key],
                        $child
                    );
            }
        }

        if (!empty($page->getPagination())) {
            $urlPagination = $this->dataExtractor->extract($html, $page->getPagination()->getRoute());

            if (count($urlPagination[0])) {
                $parsed[$page->getName()] =
                    array_merge(
                        $parsed[$page->getName()],
                        $this->parseRecursively($page, $rootResource, $urlPagination[0]['url'])[$page->getName()]
                    );
            }
        }
        return $parsed;
    }

    /**
     * @param string $url
     * @return HttpRequest
     */
    private function createRequest(string $url): HttpRequest
    {
        return new HttpRequest('GET', $url);
    }
    /**
     * @param string $url
     * @return string
     */
    private function getPage(string $url): string
    {
        $response = $this->protocol->send($this->createRequest($url), []);
        return $response->getBody()->getContents();
    }
    /**
     * @param string $url
     * @param string $rootUrl
     * @return string
     */
    private function resolveUrl(string $url, string $rootUrl): string
    {
        return
            preg_match('/http(s)?:\/\//', $url)
                ? $url
                : rtrim($rootUrl, '/') . $url;
    }
}