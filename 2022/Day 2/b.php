<?php

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

$roundEnds = [
    'X' => 'loose',
    "Y" => 'draw',
    "Z" => 'win',
];

$myResponse = [
    'loose' => [
        'A' => 'Z',
        'B' => 'X',
        'C' => 'Y'
        ],
    'draw'=> [
        'A' => 'X',
        'B' => 'Y',
        'C' => 'Z'
        ],
    'win'=> [
        'A' => 'Y',
        'B' => 'Z',
        'C' => 'X'
        ],
];

//win = 6
//draw = 3
//lose = 0
$strategyGuide = fopen('./strategyguide.txt', 'r');

$enemyMoves = [];
$myMoves = [];

$totalScore = 0;

while ($data = fgetcsv($strategyGuide, 0, ' ')) {
    $enemyMove = $data[0];
    $roundResult = $roundEnds[$data[1]];
    $myMove = $myResponse[$roundResult][$enemyMove];
    $totalScore += $scores[$myMove];
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
//starts at 1 and goes to 2500 making it 2499
echo $totalScore;
