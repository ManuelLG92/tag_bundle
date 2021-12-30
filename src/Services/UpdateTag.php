<?php

namespace Wamb\TaggingBundle\Services;

use Wamb\TaggingBundle\Entity\Tag;
use Wamb\TaggingBundle\ValueObjects\Name;

final class UpdateTag
{

    public static function update(Tag $tag, string $name): Tag
    {
        $name = new Name($name);
        return Tag::update($tag, $name);

    }
}