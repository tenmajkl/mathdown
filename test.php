<?php

use Majkel\Mathdown\Mathdown;

require __DIR__.'/vendor/autoload.php';

$pd = new Mathdown();
echo $pd->parse('$\frac{1}{2} \neq 42$'); 
