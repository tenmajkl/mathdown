<?php

namespace Majkel\Mathdown\Nodes\Macros;

use Majkel\Mathdown\Nodes\Node;

class Replace implements Node, Macro
{
    public function __construct(
        public readonly string $replace,
    ) {

    }

    public function translate(): string
    {
        return '<mo>'.$this->replace.'</mo>';
    }
}
