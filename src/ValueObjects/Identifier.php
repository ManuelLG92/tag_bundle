<?php

namespace Wamb\TaggingBundle\ValueObjects;

use Wamb\TaggingBundle\Exception\IdentifierException;
use Wamb\TaggingBundle\Exception\InvalidAttributeException;

class Identifier
{
    /**
     * @throws InvalidAttributeException
     */
    public function __construct(private readonly string $id)
    {
        IdentifierException::is($id);
    }
}