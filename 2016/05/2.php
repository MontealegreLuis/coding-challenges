<?php
$number = array_slice($argv, 1);
$i = implode('', $number) + 1;
while (strrev($i) != $i) {
  $i++;
}
echo "$i is the smallest palindrome after ", implode('', $number), PHP_EOL;
