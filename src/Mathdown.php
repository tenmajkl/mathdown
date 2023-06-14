<?php

namespace Majkel\Mathdown;

use Parsedown;

class Mathdown extends Parsedown
{
    private ?Lexer $lexer;

    public function __construct() 
    {
        $this->InlineTypes['$'] = ['Math'];
        $this->inlineMarkerList .= '$';
    }

    public function inlineMath($excerpt)
    {
        if (preg_match('/^\$(.+?)\$/', $excerpt['text'], $matches) !== 1) {
            return;
        }
        
        if (!isset($this->lexer)) {
            $this->lexer = new Lexer();
        }

        $parser = new Parser($this->lexer->lex($matches[1]));
        $html = $parser->parse()->translate();

        return [
            'extent' => strlen($matches[0]),
            'element' => [
                'name' => 'math',
                'rawHtml' => $html,
            ],
        ];
    }
}
