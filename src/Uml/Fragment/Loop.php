<?php

namespace Torunar\WebSequenceDiagrams\Uml\Fragment;

class Loop
{
    private string $condition;

    private array $items;

    public function __construct(string $condition, array $items)
    {
        $this->condition = $condition;
        $this->items = $items;
    }

    public function getCondition(): string
    {
        return $this->condition;
    }

    public function getItems(): array
    {
        return $this->items;
    }
}
