<?php
$text = str_split($argv[1]);
$repeated = [];
foreach ($text as $i => $letter) {
    if (!in_array($letter, $repeated)
        && strpos(substr($argv[1], $i + 1), $letter) === false) {
        echo "First non-repeating character is $letter", PHP_EOL;
        break;
    } else {
        $repeated[] = $letter;
    }
}
