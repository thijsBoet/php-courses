<?php

// CREATE
// connect-to-mySQL-db-PDO
// create DB
$sql = "CREATE DATABASE myDB";
$connection->exec($sql);

// create table
$sql = "CREATE TABLE MyGuests (
  id          INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  firstname   VARCHAR(30) NOT NULL,
  lastname    VARCHAR(30) NOT NULL,
  email       VARCHAR(30),
  reg_date    TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";
$connection->exec($sql);

// create prepared statements
$stmt = $connection->prepare("INSERT INTO MyGuests (firstname, lastname, email)
                             VALUES (:firstname, :lastname, :email)");
$stmt->bindParam(':firstname', $firstname);
$stmt->bindParam(':lastname', $lastname);
$stmt->bindParam(':email', $email);

// insert a row
$firstname = "John";
$lastname = "Doe";
$email = "john@example.com";
$stmt->execute();

// insert another row
$firstname = "Mary";
$lastname = "Moe";
$email = "mary@example.com";
$stmt->execute();

// insert another row
$firstname = "Julie";
$lastname = "Dooley";
$email = "julie@example.com";
$stmt->execute();

echo "New records created successfully";

// READ
$sql = $connection->prepare("SELECT id, firstname, lastname FROM MyGuests");
$stmt->execute();

// set the resulting array to associative
$result = $stmt->setFetchMode(PDO::FETCH_ASSOC);

foreach(new TableRows(new RecursiveArrayIterator($stmt->fetchAll())) as $key=>$value) {
  echo $value;
}

// UPDATE
$sql = "UPDATE MyGuests SET lastname='Doe' WHERE id=2";
$stmt = $connection->prepare($sql);
$stmt->execute();

// DELETE
$sql = "DELETE FROM MyGuests WHERE id=3";

// use exec() because no results are returned
$connection->exec($sql);
echo "Record deleted successfully";

// LIMIT
$sql = "SELECT * FROM Orders LIMIT 30";
// start at 16
$sql = "SELECT * FROM Orders LIMIT 10 OFFSET 15";