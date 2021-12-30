<?php

namespace Wamb\TaggingBundle\Entity;

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