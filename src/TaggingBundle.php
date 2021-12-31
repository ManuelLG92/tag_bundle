<?php
namespace Wamb\TaggingBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;


class TaggingBundle extends Bundle
{
    public function getPath(): string
    {
        return \dirname(__DIR__);
    }
}