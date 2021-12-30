<?php

namespace Wamb\TaggingBundle\Application\Query\FindTagById;

use Wamb\TaggingBundle\Application\Query\Response\TagDTO;
use Wamb\TaggingBundle\Application\Query\Response\TagDTOConverter;
use Wamb\TaggingBundle\Entity\Identifier;
use Wamb\TaggingBundle\Entity\Name;
use Wamb\TaggingBundle\Exception\NotFoundException;
use Wamb\TaggingBundle\Persistence\Doctrine\Transactions\TagFinder;

final class FindTagByIdUseCase
{
    public function __construct(
        private readonly TagFinder $tagFinder,
        private readonly TagDTOConverter $converter)
    {
    }

    /**
     * @throws NotFoundException
     */
    public function __invoke(Identifier $id): TagDTO
    {
        $tag = $this->tagFinder->findTagById($id->value());

        return $this->converter->convert($tag);
    }

}