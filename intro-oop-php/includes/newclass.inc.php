<?php

class Person {
  private $first = "Matthijs";
  private $last = "Boet";
  private $age = 38;

  public function owner() {
    $a = $this->first;
    return $a;
  }
}

class Pet {
  public function owner() {
    $a = "Hi there";
    return $a;
  }
}