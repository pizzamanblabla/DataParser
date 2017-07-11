<?php

namespace ParseSDKBundle\DataExtractor\Configurable;

use ParseSDKBundle\DataExtractor\Exception\DataExtractionException;
use ParseSDKBundle\Dto\Request\Route;
use ParseSDKBundle\Dto\Request\RouteElement;

final class ArrayData implements DataExtractorInterface
{
    /**
     * {@inheritdoc}
     */
    public function extract($extractable, Route $route)
    {
        if (!is_array($extractable)) {
            throw new DataExtractionException('Input data is not array');
        }

        $extracted = [];

        if (!empty($route->getGroup())) {
            $group = $this->search($extractable, $route->getGroup()->getValue());

            foreach ($group as $element) {
                $extracted[] = $this->extractNodes($route->getParseElements(), $extractable);
            }
        } else {
            $extracted[] = $this->extractNodes($route->getParseElements(), $extractable);
        }

        return $extracted;
    }

    /**
     * @param mixed[] $data
     * @param string $targetKey
     * @return mixed[]
     */
    private function search(array $data, string $targetKey): array
    {
        $found = [];

        foreach ($data as $key => $value) {
            if (is_string($key) && in_array($key, $targetKey)) {
                $found[$key] = $value;
            } elseif (is_array($value)) {
                $found = array_merge($found, $this->search($value, $targetKey));
            }
        }

        return $found;
    }

    /**
     * @param RouteElement[] $elements
     * @param array $data
     * @return string[]
     */
    private function extractNodes(array $elements, array $data): array
    {
        $extracted = [];

        foreach ($elements as $key => $element) {
            if (!empty($element->getChildren())) {
                $extracted[$element->getKey()] = $this->extractNodes($element->getChildren(), $data);
            } else {
                $extractedValues = $this->search($data, $element->getValue());

                if (count($extractedValues)) {
                    $extracted[$element->getKey()] = '';//$this->resolveDataByKey($element->getKey(), $extractedValues);
                }
            }
        }

        return $extracted;
    }
}