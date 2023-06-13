<?php

namespace Majkel\Mathdown;

use Majkel\Mathdown\Nodes\Exponentiation;
use Majkel\Mathdown\Nodes\Group;
use Majkel\Mathdown\Nodes\Index;
use Majkel\Mathdown\Nodes\Infix;
use Majkel\Mathdown\Nodes\Macros;
use Majkel\Mathdown\Nodes\Node;
use Majkel\Mathdown\Nodes\Number;
use Majkel\Mathdown\Nodes\Symbol;
use Majkel\Mathdown\Nodes\Text;
use ParseError;

class Parser
{
    public function __construct(
        public readonly TokenStream $stream
    ) {

    }

    public function parse(TokenKind $end = null): Group 
    {
        $stack = new Stack();
        while ($this->stream->curent()?->kind !== $end) {
            if ($stack->top() instanceof Infix) {
                $node = $stack->pop();
                $node->left = $stack->pop();
                $node->right = $this->parseFragment();
                $stack->push($node);
                $this->stream->next();
                continue;
            }
            $stack->push($this->parseFragment());
            $this->stream->next();
        }

        return new Group($stack->data(), false);
    }

    public function parseFragment(): Node
    {
        return 
            $this->parseNumber()
            ?? $this->parseText()
            ?? $this->parseSymbol()
            ?? $this->parseGroup()
            ?? $this->parseExponentiation()
            ?? $this->parseIndex()
            ?? $this->parseMacro()
            ?? throw new ParseError('Unexpected token')
        ;
    }

    public function parseNumber(): ?Number
    {
        if (!$this->stream->is(TokenKind::Number)) {
            return null;
        }

        return new Number($this->stream->curent()->content);
    }

    public function parseText(): ?Text
    {
        if (!$this->stream->is(TokenKind::Text)) {
            return null;
        }

        return new Text($this->stream->curent()->content);
    }

    public function parseSymbol(): ?Symbol
    {
        if (!$this->stream->is(TokenKind::Symbol)) {
            return null;
        }

        return new Symbol($this->stream->curent()->content);
    }

    public function parseGroup(): ?Group
    {
        if (!$this->stream->is(TokenKind::Open)) {
            return null;
        }

        $this->stream->next();
        return new Group($this->parse(TokenKind::Close)->content, true);
    }

    public function parseExponentiation(): ?Exponentiation
    {
        if (!$this->stream->is(TokenKind::Caret)) {
            return null;
        }

        return new Exponentiation();
    }

    public function parseIndex(): ?Index
    {
        if (!$this->stream->is(TokenKind::Underscore)) {
            return null;
        }

        return new Infix();
    }

    public function parseMacro(): ?Macros\Macro
    {
        if (!$this->stream->is(TokenKind::Backslash)) {
            return null;
        }

        $this->stream->next();
        if (!$this->stream->is(TokenKind::Text)) {
            throw new ParseError('Unexpected token');
        }

        $name = $this->stream->curent()->content;
        $args = [];

        while ($this->stream->peek()?->kind === TokenKind::CurlyOpen) {
            $this->stream->next(2);
            $args[] = $this->parse(TokenKind::CurlyClose);
        }

        return new (match($name) {
            'dfrac', 'frac' => Macros\Dfrac::class,
            'sqrt' => Macros\SquareRoot::class,
            default => throw new ParseError('Unexpected token')    
        })(...$args);
    }
}
