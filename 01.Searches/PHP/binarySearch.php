<?php declare(strict_types=1);

function binarySearch(
    array $array,
    int $number
): int {
    $low = 0;
    $high = count($array) - 1;

    while ($high >= $low) {
        $middle = intdiv(($high + $low), 2);

        if ($array[$middle] === $number) {
            return $middle;
        } else if ($array[$middle] > $number) {
            $high = $middle - 1;
        } else {
            $low = $middle + 1;
        }
    }

    return -1;
}
