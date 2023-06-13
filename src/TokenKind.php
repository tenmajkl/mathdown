<?php

namespace Majkel\Mathdown;

use ParseError;

enum TokenKind
{
    case Backslash;

    case Open;

    case Close;

    case CurlyOpen;

    case CurlyClose; 

    case Number;

    case Underscore;

    case Caret;

    case Symbol;

    case Text;

    public static function fromRe(string $re): self
    {
        return match ($re) {
            'BACKSLASH' => self::Backslash,
            'OPEN' => self::Open,
            'CLOSE' => self::Close,
            'CURLY_OPEN' => self::CurlyOpen,
            'CURLY_CLOSE' => self::CurlyClose, 
            'NUMBER' => self::Number,
            'UNDERSCORE' => self::Underscore,
            'CARET' => self::Caret,
            'SYMBOL' => self::Symbol,
            'TEXT' => self::Text,
            default => throw new ParseError('Unexpected token'),
        };
    }
    
}
