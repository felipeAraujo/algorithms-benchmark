<?php declare(strict_types=1);

function subs1(
    string $char1,
    string $char2
): int {
    if ($char1 === $char2) {
        return 0;
    }

    return 1;
}

function levenshteinSubs1(
    string $str1,
    string $str2
): int {
    $rowLength = strlen($str1);
    $lineLength = strlen($str2);

    $costs = [];
    for ($i = 0; $i <= $rowLength; ++$i) {
        $lineCosts = [];
        for ($j = 0; $j <= $lineLength; ++$j) {
            if ($i === 0) {
                $lineCosts[] = $j;
                continue;
            }

            if ($j === 0) {
                $lineCosts[] = $i;
                continue;
            }

            $lineCosts[] = min(
                $lineCosts[$j-1] + 1,
                $costs[$i-1][$j] + 1,
                $costs[$i-1][$j-1] + subs1($str1[$i-1], $str2[$j-1])
            );
        }

        $costs[] = $lineCosts;
    }

    return $costs[$rowLength][$lineLength];
}