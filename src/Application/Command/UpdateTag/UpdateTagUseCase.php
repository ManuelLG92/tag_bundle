<?php

namespace Wamb\TaggingBundle\Application\Command\UpdateTag;

use Wamb\TaggingBundle\Entity\Identifier;
use Wamb\TaggingBundle\Entity\Name;
use Wamb\TaggingBundle\Entity\Tag;
use Wamb\TaggingBundle\Exception\NotFoundException;
use Wamb\TaggingBundle\Persistence\Doctrine\Transactions\TagFinder;
use Wamb\TaggingBundle\Persistence\Doctrine\Transactions\TagSaver;

final class UpdateTagUseCase
{
    public function __construct(
        private  readonly TagFinder $tagFinder,
        private TagSaver $manager)
    {
    }

    /**
     * @throws NotFoundException
     */
    public function __invoke(Identifier $id, Name $name
    ): void
    {
        $tag = $this->tagFinder->findTagById($id->value());
        $tag->setName($name);
        $this->manager->saveTag(Tag::create($id, $name));
    }

}