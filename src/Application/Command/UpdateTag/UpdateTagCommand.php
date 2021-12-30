<?php

namespace Wamb\TaggingBundle\Application\Command\UpdateTag;

class UpdateTagCommand
{
    public function __construct(
        public readonly string $id,
        public readonly string $name,
    )
    {
    }

}