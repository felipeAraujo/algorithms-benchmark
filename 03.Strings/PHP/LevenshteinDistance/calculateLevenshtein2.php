<?php declare(strict_types=1);

require 'subs2.php';

$str1 = strtolower($argv[1]);
$str2 = strtolower($argv[2]);


echo 'levensthein: ' . levenshteinSubs2($str1, $str2) . PHP_EOL;
