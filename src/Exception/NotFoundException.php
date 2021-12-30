<?php

namespace Wamb\TaggingBundle\Exception;

final class NotFoundException extends Exception
{
    public function __construct(string $text = 'Not Found', array $parameters = [], int $code = 404, \Throwable $previous = null)
    {
        parent::__construct($text, $parameters, $code,  $previous);
        $this->text = $text;
        $this->parameters = $parameters;
    }
}