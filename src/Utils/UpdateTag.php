<?php

namespace Wamb\TaggingBundle\Utils;

use Wamb\TaggingBundle\Entity\Name;
use Wamb\TaggingBundle\Entity\Tag;

final class UpdateTag
{

    public static function update(Tag $tag, string $name): Tag
    {
        $name = new Name($name);
        return Tag::update($tag, $name);

    }
}