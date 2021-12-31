<?php

namespace Wamb\TaggingBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Wamb\TaggingBundle\Application\Command\CreateTag\CreateTagCommand;
use Wamb\TaggingBundle\Application\Command\CreateTag\CreateTagHandler;
use Wamb\TaggingBundle\Exception\InvalidAttributeException;
use Wamb\TaggingBundle\Exception\ValidationCommandException;
use Wamb\TaggingBundle\Infrastructure\Symfony\Validators\TagCommandValidator;
use Wamb\TaggingBundle\Utils\Constants\TagProperties;

final class CreateTagController extends ParentController
{
    public function __construct(
        protected ContainerInterface $container,
        private   readonly TagCommandValidator $commandValidator,
        private   readonly CreateTagHandler $handler
    )
    {
        parent::__construct($container);
    }
    /*public function __construct( private readonly TagCommandValidator $commandValidator,
                                 private readonly CreateTagHandler    $handler)
    {
    }*/


    /**
     * @throws ValidationCommandException
     * @throws InvalidAttributeException
     */
    public function __invoke(Request $request): JsonResponse
    {
        $this->commandValidator->validate($request->request->all());
        ($this->handler)(new CreateTagCommand(
            $request->request->get(TagProperties::ID->value),
            $request->request->get(TagProperties::NAME->value),
        ));
        return new JsonResponse([], 201);
    }
}