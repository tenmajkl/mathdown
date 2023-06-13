<?php

namespace Majkel\Mathdown\Nodes;

class Number implements Node
{
    public function __construct(
        public string $number,
    ) {

    }

    public function translate(): array 
    {
        return [
            'name' => 'mn',
            'text' => $this->number,
        ];
    }
}
