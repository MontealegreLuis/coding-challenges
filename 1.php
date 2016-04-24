<?php
$start = $argv[1];
$end = $argv[2];

$count = 0;
for ($i = $start; $i <= $end; $i++) {
   if (sqrt($i) == number_format(sqrt($i))) {
       $count++;
   }
}

echo "The amount of perfect squares between $start and $end is $count", PHP_EOL;
