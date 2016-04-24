<?php
$number = $argv[1];

$count = 0;
for ($i = 1; $i <= $number; $i++) {
   if (strpos((string) $i, '0') !== false) {
       $count++;
   }
}

echo "The amount of numbers that contain 0 as digit between 1 and $number is $count", PHP_EOL;
