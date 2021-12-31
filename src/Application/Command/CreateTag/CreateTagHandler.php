<?php

namespace Wamb\TaggingBundle\Application\Command\CreateTag;

use Symfony\Component\HttpFoundation\JsonResponse;
use Wamb\TaggingBundle\Entity\Identifier;
use Wamb\TaggingBundle\Entity\Name;
use Wamb\TaggingBundle\Exception\InvalidAttributeException;

final class CreateTagHandler
{
    public function __construct(private readonly CreateTagUseCase $useCase)
    {
    }

    /**
     * @throws InvalidAttributeException
     */
    public function __invoke(CreateTagCommand $command): JsonResponse
    {
        $id = new Identifier($command->id);
        $name = new Name($command->name);
        ($this->useCase)($id,$name);
        return new JsonResponse([],201);
    }
}