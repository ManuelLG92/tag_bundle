<?php

namespace Wamb\TaggingBundle\Services;

use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\JsonResponse;
use Wamb\TaggingBundle\Entity\Tag;
use Wamb\TaggingBundle\Exception\InvalidAttributeException;
use Wamb\TaggingBundle\Persistence\Doctrine\MySqlTagRepository;
use Wamb\TaggingBundle\ValueObjects\Identifier;
use Wamb\TaggingBundle\ValueObjects\Name;

final class CreateTag
{
    public function __construct(
                private  readonly MySqlTagRepository $repository,
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