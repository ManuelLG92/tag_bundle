<?php

namespace Wamb\TaggingBundle\Model;

use Wamb\TaggingBundle\ValueObjects\Identifier;
use Wamb\TaggingBundle\ValueObjects\Name;

class Tag
{
    private function __construct(
        protected readonly Identifier $id,
        protected Name $name,
    )
    {
    }

    public static function create( Identifier $id,Name $name)
    {
        return new self($id, $name);
    }

    public static function update(self $tag, Name $name)
    {
        $tag->name = $name;
        return $tag;

    }

}