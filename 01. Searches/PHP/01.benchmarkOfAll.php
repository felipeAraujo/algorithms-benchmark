<?php declare(strict_types=1);

require '../../utilFunctions/PHP/utilFunctions.php';

require 'binarySearch.php';
require 'sequentialSearch.php';

$length = (int) $argv[1];

if (!isset($length)) {
    die('Length not specified');
}

$randomArray = randomArray(
    $length,
    true
);

$numberToSearch = rand(0, $length);
$numberToSearch = $randomArray[$numberToSearch];

$t = microtime(true);
$result = binarySearch($randomArray, $numberToSearch);
$binaryTime = (microtime(true) - $t);

$t = microtime(true);
$result = array_search($numberToSearch, $randomArray);
$defaultTime = (microtime(true) - $t);

$t = microtime(true);
$result = sequentialSearch($randomArray, $numberToSearch);
$sequentialTime = (microtime(true) - $t);

$output .= 'Number to find: ' . $numberToSearch . PHP_EOL;
$output .= 'Result found in position: ' . $result . PHP_EOL;
$output .= 'Binary Search time taken: ' . $binaryTime . PHP_EOL;
$output .= 'Default Search time taken: ' . $defaultTime . PHP_EOL;
$output .= 'Sequential Search time taken: ' . $sequentialTime . PHP_EOL;
echo $output;

// Discomment if you want to see the array from the search
// $output .= 'array: ' . PHP_EOL;
// $output .= var_export($randomArray, true) . PHP_EOL;;

// file_put_contents('output.txt', $output);

unset($randomArray);
unset($output);