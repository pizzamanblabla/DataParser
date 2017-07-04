<?php

namespace ParseSDKBundle\Dto\Response;

class SuccessfulResponse implements InternalResponseInterface
{
    use Successful;

    /**
     * @var mixed[]
     */
    private $parsedData;

    /**
     * @return mixed[]
     */
    public function getParsedData()
    {
        return $this->parsedData;
    }

    /**
     * @param mixed[] $parsedData
     * @return SuccessfulResponse
     */
    public function setParsedData(array $parsedData)
    {
        $this->parsedData = $parsedData;
        return $this;
    }
}