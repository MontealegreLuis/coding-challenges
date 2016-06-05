<?php
$duplicates = [1, 1, 3, 3, 4, 4, 5, 5, 7, 7, 8,];

for ($i = 0; $i < count($duplicates); $i += 2) {
    if (!isset($duplicates[$i + 1])) {
        echo $duplicates[$i];
        break;
    }
    if ($duplicates[$i] != $duplicates[$i + 1]) {
        echo $duplicates[$i];
        break;
    }
}
