<?php

namespace Wamb\TaggingBundle\Exception;


use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Validator\ConstraintViolation;
use Symfony\Component\Validator\ConstraintViolationListInterface;

final class ValidationCommandException extends \Exception
{
    private const ERROR_CODE_NOT_EXPOSE = '7703c766-b5d5-4cef-ace7-ae0dd82304e9';

    private readonly ConstraintViolationListInterface $violations;

    public function __construct(ConstraintViolationListInterface $violations)
    {
        $this->violations = $violations;
        parent::__construct('Validation failed', Response::HTTP_UNPROCESSABLE_ENTITY);
    }

    public function getMessages(): array
    {
        $messages = [];

        /** @var ConstraintViolation $constraint */
        foreach ($this->violations as $constraint) {
            if (self::ERROR_CODE_NOT_EXPOSE === $constraint->getCode()) {
                continue;
            }

            $messages[] = [
                'propertyPath' => str_replace(['[', ']'], [''], $constraint->getPropertyPath()),
                'message' => $constraint->getMessage(),
            ];
        }

        return $messages;
    }
}
