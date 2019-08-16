<?php 

$age = [
  "Peter" => "35",
  "Ben" => "37",
  "Joe" => "43"
];

foreach($age as $key => $value){
  echo "${key} is ${value} years old.<br>";
}