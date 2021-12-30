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
    public static function create(string $name, string $id): Tag
    {
        $name = new Name($name);
        $id = new Identifier($id);
        return Tag::create($name, $id);

        return new JsonResponse(['created' => $tag], 200);
    }
}