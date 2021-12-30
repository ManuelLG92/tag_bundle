<?php

namespace Wamb\TaggingBundle\Exception;

class IdentifierException extends Exception
{

    /**
     * @throws InvalidAttributeException
     */
    private const UUID = 'id';

    /**
     * @throws InvalidAttributeException
     */
    public static function is(string $value): void
    {
        $UUIDv4Pattern = '/^[0-9A-F]{8}-[0-9A-F]{4}-4[0-9A-F]{3}-[89AB][0-9A-F]{3}-[0-9A-F]{12}$/i';

        if (!preg_match($UUIDv4Pattern, $value)) {
            throw InvalidAttributeException::fromValue(self::UUID, $value);
        }

    }

}