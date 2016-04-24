<?php
$number = $argv[1];

$count = count(array_filter(range(1, $number), function ($i) {
   return strpos($i, '0') !== false;
}));

echo "The amount of numbers that contain 0 as digit between 1 and $number is $count", PHP_EOL;
