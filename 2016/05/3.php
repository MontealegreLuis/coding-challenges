<?php
$length = $argv[1];

$count = count(array_filter(range(0, 2 ** $length - 1), function ($decimal) {
    return preg_match('/11/', decbin($decimal)) === 0;
}));

echo "The count of binary numbers of length $length without consecutive 1's is $count", PHP_EOL;
