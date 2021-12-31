<?php

namespace Wamb\TaggingBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\DependencyInjection\ContainerInterface;

class ParentController extends AbstractController
{
    public function __construct(protected ContainerInterface $container )
    {
    }
}