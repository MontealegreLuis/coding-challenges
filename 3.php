<?php
$number = $argv[1];
$digits = [
  'one', 'two', 'three', 'four', 'five', 'six', 'seven', 'eight', 'nine'
];
$tens = [
  'ten', 'twenty', 'thirty', 'forty', 'fifty', 'sixty', 'seventy', 'eighty', 'ninety'
];
$others = [
  'eleven', 'twelve', 'thirteen', 'fourteen', 'fifteen', 'sixteen', 'seventeen', 'eighteen', 'nineteen'
];

$words = '';
do {
   $exp = strlen($number);
   $multiplier = 10 ** ($exp - 1);
   $digit = (int) ($number / $multiplier) - 1;
   $number = $number % $multiplier;
   switch ($multiplier) {
      //case 10000:
      case 1000:
         $words .= $digits[$digit] . ' thousand ';
         break;
      case 100:
         $words .= $digits[$digit] . ' hundred ';
         break;
      case 10:
         if ($digit > 0) {
             $words .= $tens[$digit];
         } else {
             $digit = $digit + $number;
             $words .= $others[$digit - 1];
             $number = 0;
         }
         break;
      case 1:
         $words .= ' ' . $digits[$digit];
   }
} while ($number > 0);

echo "{$argv[1]} in word is $words", PHP_EOL;
