<?php
$numbers = explode(',', $argv[1]);

$smallest = 1;
for ($i = 0; $i < count($numbers) && $smallest >= $numbers[$i]; $i++) {
    $smallest += $numbers[$i];
}

echo "The smallest number is $smallest", PHP_EOL;
