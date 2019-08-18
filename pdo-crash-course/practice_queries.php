<?php

$host = 'localhost';
$user = 'root';
$password = '';
$dbname = 'mockdata';

// Set DSN || DATA SOURCE NAME
$dsn = "mysql:host=${host};dbname=${dbname}";

// Create PDO instance
$pdo = new PDO($dsn, $user, $password);
$pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);

// CREATE
$id = 1001;
$first_name = "Matthijs";
$last_name = "Boet";
$email = "m.boet@chello.nl";
$gender = "Male";
$ip_address = "127.0.0.1";

$sql = 'INSERT INTO mockusers(id, first_name, last_name, email, gender, ip_address)
                    VALUES(:id, :first_name, :last_name, :email, :gender, :ip_address)';
$stmt = $pdo->prepare($sql);
$stmt->execute(['id'=>$id, 'first_name'=> $first_name, 'last_name'=>$last_name, 'email'=>$email, 'gender'=>$gender, 'ip_address'=>$ip_address]);

// READ
$gender = "Male";

$sql = 'SELECT * FROM mockusers WHERE gender = :gender ORDER BY first_name ASC';
$stmt = $pdo->prepare($sql);
$stmt->execute(['gender'=>$gender]);
$users = $stmt->fetchAll();

foreach($users as $user){
  echo $user->first_name . " " . $user->last_name . "<br>";
}

// UPDATE
$id = 1001;
$ip_address = 'localhost';

$sql = 'UPDATE mockusers SET id = :id WHERE ip_address = :ip_address';
$stmt = $pdo->prepare($sql);
$stmt->execute(['id'=>$id, 'ip_address'=>$ip_address]);

// DELETE
$sql = 'DELETE FROM mockusers WHERE id = :id';
$stmt = $pdo->prepare($sql);
$stmt->execute(['id'=>$id]);

// SEARCH
$first = 'John';

$sql = 'SELECT * FROM mockusers WHERE first_name= first = :first';
$stmt = $pdo->prepare($sql);
$stmt->execute(['first'=>$first]);
$johns = $stmt->fetchAll();

foreach ($johns as $john){
  echo "John" . $john->last_name . "<BR>";
}