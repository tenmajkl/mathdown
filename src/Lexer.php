<?php

namespace Majkel\Mathdown;

class Lexer
{
    public const Re = '~
        (?<BACKSLASH>\\\\)
        |(?<OPEN>\()
        |(?<CLOSE>\))
        |(?<CURLY_OPEN>\{)
        |(?<CURLY_CLOSE>\})
        |(?<NUMBER>[0-9]+)
        |(?<UNDERSCORE>_)
        |(?<CARET>\^)
        |(?<SYMBOL>\+|\-|\*|\/|=)
        |(?<WHITESPACE>\s+)
        |(?<TEXT>[a-zA-Z]+)
        |(?<ERROR>.+)
    ~xsA';

    public function lex(string $code): TokenStream
    {
        preg_match_all(self::Re, $code, $matches, PREG_UNMATCHED_AS_NULL | PREG_SET_ORDER);

        return new TokenStream(array_values(array_filter(array_map(function ($token) {
            $token = array_filter($token, fn ($item) => null !== $item);
            $keys = array_keys($token);

            if ($keys[1] === 'WHITESPACE') {
                return null;
            }

            $result = new Token(TokenKind::fromRe($keys[1]), $token[0]);
            
            return $result;
        }, $matches), fn($item) => $item !== null)));
    } 
}
