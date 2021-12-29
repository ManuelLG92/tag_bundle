<?php

namespace Wamb\TaggingBundle\Exception;

class BadRequestException extends \Exception
{

    public function __construct(
        public string $text = 'Bad Request',
        public array $parameters = [], int $code = 400, \Throwable $previous = null)
    {
        $this->message = strtr($this->text, $this->parameters);

        parent::__construct($this->message, $code, $previous);
    }

    public static function create(string $message): static
    {
        return new static($message, []);
    }

    public function text(): string
    {
        return $this->text;
    }

    public function parameters(): array
    {
        return $this->parameters;
    }
}