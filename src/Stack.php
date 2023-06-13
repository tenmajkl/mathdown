<?php

declare(strict_types=1);

namespace Majkel\Mathdown;

use Majkel\Mathdown\Nodes\Node;

class Stack
{
    private array $data = [];

    public function push(Node $value): self
    {
        $this->data[] = $value;

        return $this;
    }

    public function pop(): ?Node  
    {
        return array_pop($this->data) ?? null;
    }

    public function top(): ?Node  
    {
        return $this->data[count($this->data) - 1] ?? null;
    }

    public function data(): array
    {
        return $this->data;
    }
}
