<?php

namespace Wamb\TaggingBundle\Application\Command\UpdateTag;

use Symfony\Component\HttpFoundation\JsonResponse;
use Wamb\TaggingBundle\Entity\Identifier;
use Wamb\TaggingBundle\Entity\Name;
use Wamb\TaggingBundle\Exception\InvalidAttributeException;
use Wamb\TaggingBundle\Exception\NotFoundException;

final class UpdateTagHandler
{
    public function __construct(private readonly UpdateTagUseCase $useCase)
    {
    }

    /**
     * @throws InvalidAttributeException
     * @throws NotFoundException
     */
    public function __invoke(UpdateTagCommand $command): JsonResponse
    {
        $id = new Identifier($command->id);
        $name = new Name($command->name);
        ($this->useCase)($id,$name);
        return new JsonResponse([],201);
    }
}