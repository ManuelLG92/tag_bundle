<?php

namespace Wamb\TaggingBundle\Application\Command\CreateTag;

use Doctrine\ORM\EntityManagerInterface;
use Wamb\TaggingBundle\Entity\Identifier;
use Wamb\TaggingBundle\Entity\Name;
use Wamb\TaggingBundle\Entity\Tag;

final class CreateTagUseCase
{
    public function __construct(private EntityManagerInterface $manager)
    {
    }

    public function __invoke(Identifier $id, Name $name
    ): void
    {
        $tag = Tag::create($id, $name);
        $this->manager->persist($tag);
        $this->manager->flush();
    }

}