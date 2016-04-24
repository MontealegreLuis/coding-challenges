<?php
$numbers = explode(',', $argv[1]);

$smallest = 1;
for ($i = 0; $i < count($numbers); $i++) {
    if ($smallest < $numbers[$i]) {
        break;
    }
    $smallest += $numbers[$i];
}

echo "The smallest number is $smallest", PHP_EOL;
