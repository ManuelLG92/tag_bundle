<?php

namespace Wamb\TaggingBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Wamb\TaggingBundle\Application\Query\FindTagById\FindTagByIdHandler;
use Wamb\TaggingBundle\Application\Query\FindTagById\FindTagByIdQuery;
use Wamb\TaggingBundle\Application\Query\Response\TagDTO;
use Wamb\TaggingBundle\Exception\InvalidAttributeException;
use Wamb\TaggingBundle\Exception\NotFoundException;
use Wamb\TaggingBundle\Exception\ValidationCommandException;
use Wamb\TaggingBundle\Infrastructure\Symfony\Validators\TagQueryValidator;
use Wamb\TaggingBundle\Utils\Constants\TagProperties;

final class FindTagByIdController extends AbstractController
{
    /**
     * @throws ValidationCommandException
     * @throws InvalidAttributeException
     * @throws NotFoundException
     */
    public function __invoke(Request            $request,
                             TagQueryValidator  $commandValidator,
                             FindTagByIdHandler $handler): TagDTO
    {
        $commandValidator->validate($request->request->all());
        return ($handler)(new FindTagByIdQuery(
            $request->request->get(TagProperties::ID->value),
        ));
    }
}