# Mathdown

[Parsedown](https://github.com/erusev/parsedown) extension supporting LaTeX math in markdown. It transpiles to [MathML](https://developer.mozilla.org/en-US/docs/Web/MathML/Element/math).

Currently supports only basic operations that I use, but its extendible.

This project is probably overkilled in context of Parsedown philosofy, but I enjoy writing parsers so here is that.

Actually LaTeX is so based its easy to parse it and strong at the same time.

## Usage

```php
<?php

use Majkel\Mathdown;

$md = Mathdown();
echo $md->text('Frequency: $f = \dfrac{1}{T}$');
```

## Todo

- [x] add greek letters
- [ ] add better errors
- [ ] write unit tests

## Contributing

Anything, mostly new macros is welcomed.

## Epilogue

Have fun dudes
