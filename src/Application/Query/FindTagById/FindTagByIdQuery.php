<?php

namespace Wamb\TaggingBundle\Application\Query\FindTagById;

final class FindTagByIdQuery
{
    public function __construct(
            public readonly string $id)
    {

    }
}