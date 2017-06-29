<?php

namespace ParseSDKBundle\Parser;

use ParseSDKBundle\DataExtractor\Configurable\DataExtractorInterface;
use ParseSDKBundle\DataProvider\DataProviderInterface;
use ParseSDKBundle\Dto\Request\InternalRequestInterface;
use ParseSDKBundle\Dto\Request\Page;
use ParseSDKBundle\Dto\Request\Request;
use ParseSDKBundle\Dto\Response\InternalResponseInterface;

class Parser implements ParserInterface
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
     * {@inheritdoc}
     * @param InternalRequestInterface|Request $request
     */
    public function parse(InternalRequestInterface $request): InternalResponseInterface
    {
        return array_map(
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
     * @param string $partPath
     * @return array
     */
    private function parseRecursively(Page $page, string $rootResource, string $partPath = null): array
    {
        $parsed = [];

        $html = $this->getPage($partPath, $rootResource);
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

    private function getPage(InternalRequestInterface $request, string $partPath)
    {
        return $this->dataProvider->provide($request, $partPath);
    }
}