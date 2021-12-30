<?php

namespace Wamb\TaggingBundle\Infrastructure\Symfony\Validators;

interface CommandValidatorInterface
{
    public function validate(array $data): void;

}