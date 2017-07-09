<?php

namespace ParseSDKBundle\DataExtractor\Configurable;

final class Factory implements FactoryInterface
{
    /**
     * @var DataExtractorInterface[]
     */
    private $components;

    /**
     * @param DataExtractorInterface[] $components
     */
    public function __construct(array $components)
    {
        $this->components = $components;
    }

    /**
     * {@inheritdoc}
     */
    public function spawn(string $type): DataExtractorInterface
    {
        if (!array_key_exists($type, $this->components)) {
            throw new \Exception();
        }

        return $this->components[$type];
    }
}