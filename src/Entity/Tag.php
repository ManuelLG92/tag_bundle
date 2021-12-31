<?php

namespace Wamb\TaggingBundle\Entity;

class Tag
{
    private function __construct(
        public readonly Identifier $id,
        public Name $name,
    )
    {
    }

    public static function create( Identifier $id,Name $name)
    {
        return new self($id, $name);
    }

    public static function update(self $tag, Name $name): Tag
    {
        $tag->name = $name;
        return $tag;

    }

    /**
     * @param Name $name
     */
    public function setName(Name $name): void
    {
        $this->name = $name;
    }

}