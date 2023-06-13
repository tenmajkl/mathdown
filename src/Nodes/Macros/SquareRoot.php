<?php

namespace Majkel\Mathdown\Nodes\Macros;

use Majkel\Mathdown\Nodes\Group;
use Majkel\Mathdown\Nodes\Node;

class SquareRoot implements Node, Macro
{
    public function __construct(
        public readonly Group $base,
        public readonly ?Group $content = null,
    ) {

    }

    public function translate(): string
    {
        if ($this->content) {
            return '<mroot>'
                .$this->base->translate()
                .$this->content->translate()
                .'</mroot>'; 
        }

        return '<msqrt>'.$this->base->translate().'</msqrt>';
    }
}
