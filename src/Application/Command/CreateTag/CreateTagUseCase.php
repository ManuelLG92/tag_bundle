<?php

namespace Wamb\TaggingBundle\Application\Command\CreateTag;

use Doctrine\ORM\EntityManagerInterface;
use Wamb\TaggingBundle\Entity\Identifier;
use Wamb\TaggingBundle\Entity\Name;
use Wamb\TaggingBundle\Entity\Tag;
use Wamb\TaggingBundle\Persistence\Doctrine\Transactions\TagSaver;

final class CreateTagUseCase
{
    public function __construct(public TagSaver $saver)
    {
    }

    public function __invoke(
        Identifier $id, Name $name
    ): void
    {
        $tag = Tag::create($id, $name);
        $this->saver->saveTag($tag);
        //$this->manager->persist($tag);
        //$this->manager->flush();
    }

}