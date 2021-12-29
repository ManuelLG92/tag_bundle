<?php

namespace Wamb\TaggingBundle\Model;

use Wamb\TaggingBundle\ValueObjects\Identifier;
use Wamb\TaggingBundle\ValueObjects\Name;

final class Tag
{
    private function __construct(
        private Name $name,
        private readonly Identifier $id,
    )
    {
    }

    public static function create(Name $name, Identifier $id)
    {
        return new self($name, $id);
    }

    public static function update(self $tag, Name $name)
    {
        $tag->name = $name;
        return $tag;

    }

}