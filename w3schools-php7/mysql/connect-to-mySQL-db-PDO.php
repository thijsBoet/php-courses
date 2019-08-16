<?php

$servername = "localhost";
$username = "root";
$password = "";
$database = "data";

// Create connection
try {
  $connection = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
  // set the PDO error mode to exception => development
  $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  echo "Connected successfull to $database";
} catch(PDOException $e) {
  echo "Connection failed: " . $e->getMessage();
}

// Close connection 
$connection = null;