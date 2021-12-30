<?php

namespace Wamb\TaggingBundle\Services;

use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\JsonResponse;
use Wamb\TaggingBundle\Entity\Identifier;
use Wamb\TaggingBundle\Entity\Name;
use Wamb\TaggingBundle\Entity\Tag;
use Wamb\TaggingBundle\Exception\InvalidAttributeException;

final class CreateTag
{
    public function __construct(
                //private  readonly MySqlTagRepository $repository,
                private EntityManagerInterface $manager
    )
    {
    }

    /**
     * @throws InvalidAttributeException
     */
    public function create(string $name, string $id): Tag
    {
        $name = new Name($name);
        $id = new Identifier($id);
        $tag = Tag::create($id, $name);
        $this->manager->persist($tag);
        $this->manager->flush();
        return $tag;

        return new JsonResponse(['created' => $tag], 200);
    }
}