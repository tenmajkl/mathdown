<?php

namespace Majkel\Mathdown\Nodes\Macros;

use Majkel\Mathdown\Nodes\Group;
use Majkel\Mathdown\Nodes\Node;

class Dfrac implements Node, Macro
{
    public function __construct(
        public readonly Group $top,
        public readonly Group $bottom, 
    ) {

    }
    
    public function translate(): string
    {
        return 
            '<mfrac>'
            .$this->top->translate()
            .$this->bottom->translate()
            .'</mfrac>'
        ;
    }
}
