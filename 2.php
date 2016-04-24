<?php
$number = $argv[1];

$sum = 0;
for ($i = 1; $i <= $number; $i++) {
   $digits = str_split((string) $i);

   foreach ($digits as $digit) {
      $sum += $digit;
   }
}

echo "The sum of digits between 1 and $number is $sum", PHP_EOL;
