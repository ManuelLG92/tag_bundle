<?php

namespace Wamb\TaggingBundle\Application\Query\Response;

class TagDTO
{
    public function __construct(
        private readonly string $id,
        private readonly string $name,
    )
    {
    }
}