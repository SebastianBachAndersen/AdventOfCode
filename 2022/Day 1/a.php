<?php

$file = file_get_contents('./elfCalories.txt');

$elfArray = explode(PHP_EOL, $file);

$elfCount = [];

$count = 0;
foreach ($elfArray as $elf) {
    if (!$elf) {
        $elfCount[] = $count;
        $count = 0;
    } else {
        $count += $elf;
    }
}

echo max($elfCount);