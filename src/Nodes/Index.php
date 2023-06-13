<?php

namespace Majkel\Mathdown\Nodes;

class Index implements Node, Infix
{
    public function __construct(
        public readonly Node $left,
        public readonly Node $right,
    ) {

    }

    public function translate(): string
    {
        return '<munder>'.$this->left->translate().$this->right->translate().'</munder>';
    }
}

