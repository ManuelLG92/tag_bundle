<?php

namespace Wamb\TaggingBundle\Persistence\Doctrine\Transactions;

use Doctrine\ORM\EntityManagerInterface;
use Wamb\TaggingBundle\Entity\Tag;
use Wamb\TaggingBundle\Exception\NotFoundException;
use Wamb\TaggingBundle\Utils\Constants\TagProperties;

final class TagFinder
{

    private function __construct(private readonly EntityManagerInterface $manager)
    {
    }

    /**
     * @throws NotFoundException
     */
    public function findTagById(string $id): Tag
    {
        /** @var Tag $tag */
        $tag = $this->manager->getRepository(Tag::class)->findOneBy([TagProperties::ID->value => $id]);

        if (!$tag){
            throw new NotFoundException();
        }
        return $tag;

    }


}