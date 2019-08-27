<?php declare(strict_types=1);

function quickSort(
    array &$array
): array {
    $length = count($array);

    if ($length === 0 ||
        $length === 1 ||
        (
            $length === 2 &&
            $array[0] <= $array[1]
        )
    ) {
        return $array;
    }

    if ($length === 2) {
        return [$array[1], $array[0]];
    }

    $pivotNumber = $array[0];

    $higherArray = [];
    $lesserArray = [];

    for ($i = 1; $i < $length; ++$i) {
        if ($array[$i] >= $pivotNumber) {
            $higherArray[] = $array[$i];
            continue;
        }

        $lesserArray[] = $array[$i];
    }

    return array_merge(
        quickSort($lesserArray),
        [$pivotNumber],
        quickSort($higherArray)
    );
}