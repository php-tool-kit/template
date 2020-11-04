<?php

require 'vendor/autoload.php';

\ptk\template\load('examples/views');

echo \ptk\template\render('sample1.twig', [
    'start' => 1,
    'end' => 10
]);