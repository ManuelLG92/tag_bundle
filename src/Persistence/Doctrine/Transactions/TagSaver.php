<?php

namespace Wamb\TaggingBundle\Persistence\Doctrine\Transactions;

use Doctrine\ORM\EntityManagerInterface;
use Wamb\TaggingBundle\Entity\Tag;

final class TagSaver
{

    private function __construct(private readonly EntityManagerInterface $manager)
    {
    }


    public function saveTag(Tag $tag): void
    {
            $this->manager->persist($tag);
            $this->manager->flush();

    }


}