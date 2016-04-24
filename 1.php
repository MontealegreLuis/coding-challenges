<?php
$start = $argv[1];
$end = $argv[2];

$count = count(array_filter(range($start, $end), function ($i) {
    return sqrt($i) == number_format(sqrt($i));
}));

echo "The amount of perfect squares between $start and $end is $count", PHP_EOL;
