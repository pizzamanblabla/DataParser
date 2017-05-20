<?php

namespace ParseSDKBundle\Facade;

use ParseSDKBundle\Dto\Request\InternalRequestInterface;
use ParseSDKBundle\Enumeration\ResultType;
use ParseSDKBundle\Facade\Exception\ValidationException;
use ParseSDKBundle\Service\ServiceInterface;
use ParseSDKBundle\Transformer\Response\TransformerFactoryInterface;
use ParseSDKBundle\Transformer\TransformerInterface;
use Symfony\Component\Validator\Validator\ValidatorInterface;

class DataParser
{
    /**
     * @var TransformerInterface
     */
    private $transformer;

    /**
     * @var ValidatorInterface
     */
    private $validator;

    /**
     * @var ServiceInterface
     */
    private $parseService;

    /**
     * @var TransformerFactoryInterface
     */
    private $responseTransformerFactory;

    /**
     * @param TransformerInterface $transformer
     * @param ValidatorInterface $validator
     * @param ServiceInterface $parseService
     * @param TransformerFactoryInterface $responseTransformerFactory
     */
    public function __construct(
        TransformerInterface $transformer,
        ValidatorInterface $validator,
        ServiceInterface $parseService,
        TransformerFactoryInterface $responseTransformerFactory
    ) {
        $this->transformer = $transformer;
        $this->validator = $validator;
        $this->parseService = $parseService;
        $this->responseTransformerFactory = $responseTransformerFactory;
    }

    /**
     * @param array $config
     * @param string $responseType
     * @return mixed
     */
    public function parse(array $config, $responseType)
    {
        $request = $this->transformer->transform($config);

        $this->validateRequest($request);

        $response = $this->parseService->behave($request);

        return $this->responseTransformerFactory->spawn(ResultType::create($responseType))->transform($response);
    }

    /**
     * @param InternalRequestInterface $request
     * @return void
     * @throws ValidationException
     */
    private function validateRequest(InternalRequestInterface $request)
    {
        $errors = $this->validator->validate($request);

        if (count($errors) > 0) {
            throw new ValidationException((string)$errors);
        }
    }
}