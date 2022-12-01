<?php

$file = file_get_contents('./elfCalories.txt');

$elfArray = explode(PHP_EOL,$file);

$elfCount = [];

$count = 0;
foreach ($elfArray as $elf) {
    if (!$elf) {
        $elfCount[] = $count;
        $count = 0;
    } else {
    $count += $elf;    }
}

$top3 = 0;

for ($i = 0; $i < 3; $i++) {
    $max = max($elfCount);
    $top3 += $max;
    $key = array_search($max, $elfCount);
    unset($elfCount[$key]);
}

echo $top3;