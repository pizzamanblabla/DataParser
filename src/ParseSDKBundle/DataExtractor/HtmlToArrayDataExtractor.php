<?php

namespace ParseSDKBundle\DataExtractor;

use DOMXPath;
use DOMNode;
use DOMNodeList;
use ParseSDKBundle\Dto\Route;
use ParseSDKBundle\Dto\RouteElement;

class HtmlToArrayDataExtractor extends BaseHtmlToArrayDataExtractor implements DynamicDataExtractorInterface
{
    /**
     * @param string $extractable
     * @param Route $route
     * @return string[]
     */
    public function extract($extractable, $route)
    {
        $xpath = $this->buildXpathFromHtml($extractable);
        $extracted = [];

        if (!empty($route->getGroup())) {
            $group = $this->extractGroup($route->getGroup(), $xpath);

            foreach ($group as $element) {
                $extracted[] = $this->extractNodes($route->getParseElements(), $xpath, $element);
            }
        } else {
            $extracted[] = $this->extractNodes($route->getParseElements(), $xpath);
        }

        return $extracted;
    }

    /**
     * @param RouteElement[] $elements
     * @param DOMXPath $xpath
     * @param DOMNode|null $parentNode
     * @return string[]
     */
    private function extractNodes(array $elements, DOMXPath $xpath, DOMNode $parentNode = null): array
    {
        $extracted = [];

        foreach ($elements as $key => $element) {
            /** @var RouteElement $element */
            if (!empty($element->getChildren())) {
                $extracted[$element->getKey()] = $this->extractNodes($element->getChildren(), $xpath);
            } else {
                $extractedValues = $this->extractGroup($element->getValue(), $xpath, $parentNode);

                if ($extractedValues->length) {
                    $extracted[$element->getKey()] = $this->resolveDataByKey($element->getKey(), $extractedValues);
                }
            }
        }

        return $extracted;
    }

    /**
     * @param string $path
     * @param DOMXPath $xpath
     * @param DOMNode|null $parentNode
     * @return DOMNodeList
     */
    private function extractGroup(string $path, DOMXPath $xpath, DOMNode $parentNode = null): DOMNodeList
    {
        return
            is_null($parentNode)
                ? $xpath->query($path)
                : $xpath->query($path, $parentNode)
            ;
    }

    /**
     * @param string $key
     * @param DOMNodeList $list
     * @return array|string
     */
    private function resolveDataByKey(string $key, DOMNodeList $list)
    {
        return
            preg_match('/_all/', $key)
                ? $this->mapNodeList($list)
                : $list->item(0)->textContent
            ;
    }

    /**
     * @param DOMNodeList $list
     * @return array
     */
    private function mapNodeList(DOMNodeList $list): array
    {
        $nodes = [];

        foreach ($list as $element) {
            $nodes[] = $element->textContent;
        }

        return $nodes;
    }
}