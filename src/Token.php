<?php

namespace Majkel\Mathdown;

class Token
{
    public function __construct(
        public readonly TokenKind $kind,
        public readonly string $content,
    ) {

    }
}
