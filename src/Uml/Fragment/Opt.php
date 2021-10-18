<?php

namespace Torunar\WebSequenceDiagrams\Uml\Fragment;

class Opt
{
    protected string $message;

    private array $items;

    public function __construct(string $message, array $items)
    {
        $this->message = $message;
        $this->items = $items;
    }

    public function getItems(): array
    {
        return $this->items;
    }

    public function getMessage(): string
    {
        return $this->message;
    }
}
