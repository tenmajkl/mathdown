<?php

require __DIR__.'/vendor/autoload.php';

use Majkel\Mathdown\Lexer;
use Majkel\Mathdown\Parser;

$lexer = new Lexer();

$parser = new Parser($lexer->lex('\dfrac{2^(1 + 2)}{2 + 4}'));
print_r($parser->parse()->translate());
