<?php

namespace Wamb\TaggingBundle\Application\Query\Response;

use Wamb\TaggingBundle\Entity\Tag;

final class TagDTOConverter
{
    public function convert(Tag $tag)
    {
        return new TagDTO(
            $tag->id->value(),
            $tag->name->value(),
        );
    }
}