<?php

namespace Majkel\Mathdown\Nodes;

class Number implements Node
{
    public function __construct(
        public string $number,
    ) {

    }

    public function translate(): string 
    {
        return '<mn>'.$this->number.'</mn>';
    }
}
