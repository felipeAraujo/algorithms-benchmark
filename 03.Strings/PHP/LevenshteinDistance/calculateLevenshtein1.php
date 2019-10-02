<?php declare(strict_types=1);

require 'subs1.php';

$str1 = strtolower($argv[1]);
$str2 = strtolower($argv[2]);


echo 'levensthein: ' . levenshteinSubs1($str1, $str2) . PHP_EOL;
