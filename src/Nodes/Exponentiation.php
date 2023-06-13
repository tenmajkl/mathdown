<?php

namespace Majkel\Mathdown\Nodes;

class Exponentiation implements Node, Infix
{
    public function __construct(
        public ?Node $left = null,
        public ?Node $right = null,
    ) {

    }

    public function translate(): string
    {
        return '<msup>'.$this->left->translate().$this->right->translate().'</msup>';
    }
}
