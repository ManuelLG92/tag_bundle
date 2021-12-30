<?php

namespace Wamb\TaggingBundle\Entity;

use Wamb\TaggingBundle\Exception\InvalidAttributeException;
use Wamb\TaggingBundle\Utils\Constants\TagProperties;

class Name
{
    private const MAX_LENGTH = 100;
    private const MIN_LENGTH = 2;
    public function __construct(private readonly string $value)
    {
        if (empty($value)){
            InvalidAttributeException::fromEmpty(TagProperties::NAME->value);
        }

        if (strlen($value) < self::MIN_LENGTH || strlen($value) > self::MAX_LENGTH){
            InvalidAttributeException::fromLength(TagProperties::NAME->value,self::MAX_LENGTH,self::MIN_LENGTH);
        }

    }


    public function value(): string
    {
        return $this->value;
    }
}