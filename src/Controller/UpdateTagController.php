<?php

namespace Wamb\TaggingBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Wamb\TaggingBundle\Application\Command\CreateTag\CreateTagCommand;
use Wamb\TaggingBundle\Application\Command\CreateTag\CreateTagHandler;
use Wamb\TaggingBundle\Application\Command\UpdateTag\UpdateTagCommand;
use Wamb\TaggingBundle\Application\Command\UpdateTag\UpdateTagHandler;
use Wamb\TaggingBundle\Exception\InvalidAttributeException;
use Wamb\TaggingBundle\Exception\NotFoundException;
use Wamb\TaggingBundle\Exception\ValidationCommandException;
use Wamb\TaggingBundle\Infrastructure\Symfony\Validators\TagCommandValidator;
use Wamb\TaggingBundle\Utils\Constants\TagProperties;

final class UpdateTagController extends AbstractController
{
    /**
     * @throws ValidationCommandException
     * @throws InvalidAttributeException
     * @throws NotFoundException
     */
    public function __invoke(Request                   $request,
                             TagCommandValidator $commandValidator,
                             UpdateTagHandler          $handler): JsonResponse
    {
        $commandValidator->validate($request->request->all());
        ($handler)(new UpdateTagCommand(
            $request->request->get(TagProperties::ID->value),
            $request->request->get(TagProperties::NAME->value),
        ));
        return new JsonResponse([], 201);
    }
}