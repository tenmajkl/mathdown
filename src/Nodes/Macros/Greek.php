<?php

namespace Majkel\Mathdown\Nodes\Macros;

use Majkel\Mathdown\Nodes\Node;

class Greek implements Node, Macro
{
    // todo for rendering use some array of unicode letters

    public function __construct(
        public readonly string $letter
    ) {

    }
}
