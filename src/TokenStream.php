<?php

declare(strict_types=1);

namespace Majkel\Mathdown;

class TokenStream
{
    public int $pointer = 0;

    public function __construct(
        /** @var array<Token> $tokens */
        public readonly array $tokens
    ) {
    }

    public function curent(): ?Token
    {
        return $this->tokens[$this->pointer] ?? null;
    }

    public function next(int $pos = 1): ?Token
    {
        $this->pointer += $pos;

        return $this->curent() ?? null;
    }

    public function peek(int $pos = 1): ?Token
    {
        return $this->tokens[$this->pointer + $pos] ?? null;
    }

    public function is(TokenKind $kind): bool
    {
        return $this->curent()?->kind === $kind;
    }
}
