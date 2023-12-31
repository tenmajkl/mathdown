<?php

namespace Majkel\Mathdown\Nodes;

class Text implements Node
{
    public function __construct(
        public readonly string $content,
    ) {

    }

    public function translate(): string
    {
        return '<mi>'.$this->content.'</mi>';
    }
}
