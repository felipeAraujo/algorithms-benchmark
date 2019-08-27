<?php declare(strict_types=1);

function sequentialSearch(
    array $array,
    int $number
): int {
    $length = count($array);

    for ($i = 0; $i < $length; ++$i) {
        if ($array[$i] === $number) {
            return $i;
        }

        if ($array[$i] > $number) {
            return -1;
        }
    }

    return -1;
}
