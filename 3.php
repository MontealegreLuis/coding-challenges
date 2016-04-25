<?php
require __DIR__ . '/vendor/autoload.php';

$number = $argv[1];

$numberToWords = new NumberToWords();

echo "{$number} in words is: {$numberToWords->convert($number)}", PHP_EOL;
