<?php

namespace Wamb\TaggingBundle\Services;

use Symfony\Component\HttpFoundation\JsonResponse;
use Wamb\TaggingBundle\Model\Tag;
use Wamb\TaggingBundle\ValueObjects\Name;

final class UpdateTag
{

    public static function update(Tag $tag, string $name): JsonResponse
    {
        $name = new Name($name);
        $tag = Tag::update($tag, $name);
        return new JsonResponse(['updated' => $tag], 201);

    }
}