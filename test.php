<?php

use Majkel\Mathdown\Mathdown;

require __DIR__.'/vendor/autoload.php';

$pd = new Mathdown();
echo $pd->text('cau $\frac{1}{T}$'); 
