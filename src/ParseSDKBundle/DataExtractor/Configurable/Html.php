<?php

namespace ParseSDKBundle\DataExtractor\Configurable;

use DOMXPath;
use DOMNode;
use DOMNodeList;
use DOMDocument;
use ParseSDKBundle\Dto\Request\Route;
use ParseSDKBundle\Dto\Request\RouteElement;

final class Html implements DataExtractorInterface
{
    /**
     * {@inheritdoc}
     */
    public function extract($extractable, Route $route)
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
     * @param string $html
     * @return DOMXPath
     */
    private function buildXpathFromHtml(string $html): DOMXPath
    {
        libxml_use_internal_errors(true);

        $dom = new DOMDocument('1.0', 'UTF-8');
        $dom->formatOutput = true;
        $dom->encoding = 'UTF-8';
        $dom->loadHTML($html);

        return new DOMXPath($dom);
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
                $extractedValues = $this->extractGroup($element, $xpath, $parentNode);

                if ($extractedValues->length) {
                    $extracted[$element->getKey()] = $this->resolveDataByKey($element->getKey(), $extractedValues);
                }
            }
        }

        return $extracted;
    }

    /**
     * @param RouteElement $element
     * @param DOMXPath $xpath
     * @param DOMNode|null $parentNode
     * @return DOMNodeList
     */
    private function extractGroup(RouteElement $element, DOMXPath $xpath, DOMNode $parentNode = null): DOMNodeList
    {
        return
            is_null($parentNode)
                ? $xpath->query($element->getValue())
                : $xpath->query($element->getValue(), $parentNode)
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