<?php

namespace Wamb\TaggingBundle\Services;

use Symfony\Component\HttpFoundation\JsonResponse;
use Wamb\TaggingBundle\Exception\InvalidAttributeException;
use Wamb\TaggingBundle\Model\Tag;
use Wamb\TaggingBundle\ValueObjects\Identifier;
use Wamb\TaggingBundle\ValueObjects\Name;

final class CreateTag
{
    /**
     * @throws InvalidAttributeException
     */
    public static function create(string $name, string $id): JsonResponse
    {
        $name = new Name($name);
        $id = new Identifier($id);
        Tag::create($name, $id);
        return new JsonResponse([], 201);
    }
}