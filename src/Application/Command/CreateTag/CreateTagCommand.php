<?php

namespace Wamb\TaggingBundle\Application\Command\CreateTag;

class CreateTagCommand
{
    public function __construct(
        public readonly string $id,
        public readonly string $name,
    )
    {
    }

}