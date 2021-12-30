<?php

namespace Wamb\TaggingBundle\Application\Query\FindTagById;

use Wamb\TaggingBundle\Application\Query\Response\TagDTO;
use Wamb\TaggingBundle\Entity\Identifier;
use Wamb\TaggingBundle\Exception\InvalidAttributeException;
use Wamb\TaggingBundle\Exception\NotFoundException;

final class FindTagByIdHandler
{
    public function __construct(private  readonly FindTagByIdUseCase $useCase)
    {
    }

    /**
     * @throws InvalidAttributeException
     * @throws NotFoundException
     */
    public function __invoke(FindTagByIdQuery $query): TagDTO
    {
        return ($this->useCase)(new Identifier($query->id));
    }
}