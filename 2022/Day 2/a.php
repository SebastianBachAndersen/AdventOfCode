<?php
//rock
//a
//x

//paper
//b
//y

//scissor
//c
//z

$beatMap = [
    "A" => 'Z',
    "B" => 'X',
    'C' => 'Y'
];

$scores = [
    'X' => 1,
    "Y" => 2,
    "Z" => 3
];

$typeMove = [
    'X' => 'rock',
    'A' => 'rock',
    "Y" => 'paper',
    'B' => 'paper',
    "Z" => 'scissor',
    'C' => 'scissor'
];

//win = 6
//draw = 3
//lose = 0
$strategyGuide = fopen('./strategyguide.txt', 'r');

$totalScore = 0;
while ($data = fgetcsv($strategyGuide, 0, ' ')) {
    $enemyMove = $data[0];
    $myMove = $data[1];
    $totalScore += $scores[$myMove];
    //draw
    if ($typeMove[$myMove] === $typeMove[$enemyMove]) {
        $totalScore += 3;
    } else {
        if ($beatMap[$enemyMove] !== $myMove) {
            $totalScore += 6;
        }
    }
    echo $enemyMove;
    echo $myMove . PHP_EOL;
}

echo $totalScore;
