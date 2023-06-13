<?php

namespace Majkel\Mathdown\Nodes;

class Group implements Node 
{
    public function __construct(
        /**
         * @property Node[] $content
         */
        public readonly array $content,
        public readonly bool $brackets,
    ) {

    }

    public function translate(): string
    {
        return 
            '<mrow>'
            .($this->brackets ? '<mo>(</mo>' : '')
            .array_reduce($this->content, fn($carry, $item) => $carry. $item->translate())
            .($this->brackets ? '<mo>)</mo>' : '')
            .'</mrow>';
    }
}
