<?php

$host = 'localhost';
$user = 'root';
$password = '';
$dbname = 'mockdata';

// Set DSN || DATA SOURCE NAME
$dsn = "mysql:host=${host};dbname=${dbname}";

// Create PDO instance
$pdo = new PDO($dsn, $user, $password);

function findFinalId($pdo){
  $sql = 'SELECT * FROM mockusers ORDER BY id DESC LIMIT 0, 1';
  $stmt = $pdo->execute($sql);
  echo $stmt;
}

findFinalId($pdo);

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