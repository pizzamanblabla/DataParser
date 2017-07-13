<?php

namespace ParseSDKBundle\Tests\DataExtractor\Configurable;

use ParseSDKBundle\Dto\Request\Route;
use ParseSDKBundle\Dto\Request\RouteElement;
use PHPUnit\Framework\TestCase;

final class ArrayDataTest //extends TestCase
{
    const KEY = 'test';

    const VALUE = 'value';

    const CHILD_KEY = 'child_key';

    const CHILD_VALUE = 'child_value';

    /**
     * @test
     * @dataProvider extractDataProvider
     */
    public function extract($extractable, Route $route, array $expected)
    {
        $dataExtractor = $this->createDataExtractor();

        $actualResponse = $dataExtractor->extract($extractable, $route);

        self::assertEquals($actualResponse, $expected);
    }

    /**
     * @return mixed[]
     */
    public function extractDataProvider()
    {
        return
            [
                'Successful extraction of single element' =>
                    [
                        [],
                        new Route(),
                        [],
                    ],
            ];
    }

    /**
     * @return DataExtractorInterface
     */
    private function createDataExtractor(): DataExtractorInterface
    {
        return new ArrayData();
    }

    /**
     * @return Route
     */
    private function createRoute(): Route
    {
        return (new Route())->setParseElements([$this->createRouteElement()]);
    }

    /**
     * @return RouteElement
     */
    private function createRouteElement(): RouteElement
    {
        return
            (new RouteElement())
                ->setKey(self::KEY)
                ->setValue(self::VALUE)
                ->setChildren([$this->createChildRouteElement()])
            ;
    }

    private function createChildRouteElement(): RouteElement
    {
        return
            (new RouteElement())
                ->setKey(self::KEY)
                ->setValue(self::VALUE)
                ->setChildren([])
            ;
    }
}