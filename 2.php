<?php
$number = $argv[1];

$sum = array_reduce(range(1, $number), function ($carry, $i) {
   return $carry += array_sum(str_split($i));
});

echo "The sum of digits between 1 and $number is $sum", PHP_EOL;
