<?php

namespace Majkel\Mathdown\Nodes\Macros;

use Majkel\Mathdown\Nodes\Node;

class Neq implements Node, Macro
{
    public function translate(): string
    {
        return '<mo>&ne;</mo>';
    }
}
