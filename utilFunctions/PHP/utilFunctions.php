<?php declare(strict_types = 1);

function untilEspecificSize(
    array &$array,
    int $size
): void {
    $wanted = $size - count($array);
    
    for ($i = 0; $i < $wanted; ++$i) {
        $array[] = rand(PHP_INT_MIN, PHP_INT_MAX);
    }

    $array = array_unique($array);

    if (count($array) < $size) {
        untilEspecificSize($array, $size);
    }
}

function randomArray(
    int $size,
    bool $sorted = true
): array {
    $randomArray = [];

    untilEspecificSize($randomArray, $size);

    if ($sorted) {
        sort($randomArray);
    }

    return $randomArray;
}
