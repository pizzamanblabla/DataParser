<?php

namespace ParseSDKBundle\Parser;

use ParseSDKBundle\DataExtractor\Configurable\DataExtractorInterface;
use ParseSDKBundle\DataProvider\DataProviderInterface;
use ParseSDKBundle\Dto\Request\InternalRequestInterface;
use ParseSDKBundle\Dto\Request\Page;
use ParseSDKBundle\Dto\Request\Request;
use ParseSDKBundle\Dto\Response\InternalResponseInterface;

final class Parser implements ParserInterface
{
    /**
     * @var DataExtractorInterface
     */
    private $dataExtractor;

    /**
     * @var DataProviderInterface
     */
    private $dataProvider;

    /**
     * @param DataExtractorInterface $dataExtractor
     * @param DataProviderInterface $dataProvider
     */
    public function __construct(DataExtractorInterface $dataExtractor, DataProviderInterface $dataProvider)
    {
        $this->dataExtractor = $dataExtractor;
        $this->dataProvider = $dataProvider;
    }

    /**
     * @param InternalRequestInterface|Request $request
     * @return InternalResponseInterface
     */
    public function parse(InternalRequestInterface $request): InternalResponseInterface
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

        $html = $this->dataProvider->provide($page->getQuery()->setPath($pageUrl));

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