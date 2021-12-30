<?php

namespace Wamb\TaggingBundle\Entity;

use Wamb\TaggingBundle\Exception\InvalidAttributeException;

class Name
{
    private const MAX_LENGTH = 100;
    private const MIN_LENGTH = 2;
    private const ATTRIBUTE_NAME = 'Name';
    public function __construct(private readonly string $value)
    {
        if (empty($value)){
            InvalidAttributeException::fromEmpty(self::ATTRIBUTE_NAME);
        }

        if (strlen($value) < self::MIN_LENGTH || strlen($value) > self::MAX_LENGTH){
            InvalidAttributeException::fromLength(self::ATTRIBUTE_NAME,self::MAX_LENGTH,self::MIN_LENGTH);
        }

    }
}