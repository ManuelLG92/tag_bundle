<?php

namespace Wamb\TaggingBundle\Exception;

class InvalidAttributeException extends \Exception
{

    public static function fromText(string $text): self
    {
        return new static($text);
    }

    public static function fromEmpty(string $attribute): self
    {
        return new static('%attribute% must not be empty.', ['%attribute%' => $attribute]);
    }

    public static function fromValue(string $attribute, string $value): self
    {
        return new static('%attribute% was invalid because of its value "%value%".', ['%attribute%' => $attribute, '%value%' => $value]);
    }

    public static function fromMinLength(string $attribute, string $length): self
    {
        return new static('%attribute% length cannot be less than %length% characters.', ['%attribute%' => $attribute, '%length%' => $length]);
    }

    public static function fromMaxLength(string $attribute, string $length): self
    {
        return new static('%attribute% length cannot be more than %length% characters.', ['%attribute%' => $attribute, '%length%' => $length]);
    }

    public static function fromLength(string $attribute, string $maxLength, string $minLength): self
    {
        return new static('%attribute% length cannot be more than %maxLength% characters.',
            ['%attribute%' => $attribute, '%minLength%' => $minLength, '%maxLength%' => $maxLength]);
    }
}