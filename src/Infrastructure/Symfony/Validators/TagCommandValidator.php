<?php

namespace Wamb\TaggingBundle\Infrastructure\Symfony\Validators;

use Symfony\Component\Validator\Validator\ValidatorInterface;
use Symfony\Component\Validator\Constraints as Assert;
use Wamb\TaggingBundle\Exception\ValidationCommandException;
use Wamb\TaggingBundle\Utils\Constants\TagProperties;

final class TagCommandValidator implements CommandValidatorInterface
{
    public function __construct(
        private readonly ValidatorInterface $validator
    ) {
    }

    /**
     * @throws ValidationCommandException
     */
    public function validate(array $data): void
    {
        $constraints = new Assert\Collection([
            TagProperties::ID->value => new Assert\Uuid(),
            TagProperties::NAME->value => [new Assert\NotBlank()],
        ]);

        $violations = $this->validator->validate($data, $constraints);

        if ($violations->count() > 0) {
            throw new ValidationCommandException($violations);
        }
    }
}