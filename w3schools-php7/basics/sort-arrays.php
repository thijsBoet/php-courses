<?php

$numbers = [56, 45, 89, 9, 46, 5, 80, 40, 19, 35, 99];
$age = array("Peter"=>"35", "Ben"=>"37", "Joe"=>"43");

$sorted = sort($numbers);
$reversSorted = rsort($number);

$ascendingOrderAssoc = asort($age);
$descendingOrderAssoc = krsort($age);