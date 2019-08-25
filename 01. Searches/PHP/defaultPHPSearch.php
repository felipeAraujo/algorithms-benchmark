<?php declare(strict_types=1);

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

$length = (int) $argv[1];

if (!isset($length)) {
    die('Lenght not specified');
}

$randomArray = [];

$numberToSearch = rand(0, $length);

untilEspecificSize($randomArray, $length);

$numberToSearch = $randomArray[$numberToSearch];
sort($randomArray);

$t = microtime(true);
$result = array_search($numberToSearch, $randomArray);
$time = (microtime(true) - $t);

$output = 'Binary Search ' . PHP_EOL;
$output .= 'Number to find: ' . $numberToSearch . PHP_EOL;
$output .= 'Result found in position: ' . $result . PHP_EOL;
$output .= 'time taken: ' . $time . PHP_EOL;
echo $output;

// Discomment if you want to see the array from the search
// $output .= 'array: ' . PHP_EOL;
// $output .= var_export($randomArray, true) . PHP_EOL;;

// file_put_contents('output.txt', $output);

unset($randomArray);
unset($output);

