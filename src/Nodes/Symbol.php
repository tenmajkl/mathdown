<?php

namespace Majkel\Mathdown\Nodes;

class Symbol implements Node
{ 
    public function __construct(
        public readonly string $symbol,
    ) {

    }

    public function translate(): string
    {
        return [
            'name' => 'mo',
            'text' => $this->symbol,
        ];    
    }
}
