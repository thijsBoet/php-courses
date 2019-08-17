<?php

# Benefits of PDO
# -------------------------------
# Support for multiple databases
# Security => Prepared Statements
# Usability
# Reusability
# Great Error Handling Options

# Tree PDO Classes
# -------------------------------
# PDO            Connection between PHP and DB || DSN
# PDOStatement   Represents a prepared statement and after executed an associated result
# PDOException   Represents errors raised bu PDO

$host = 'localhost';
$user = 'root';
$password = '';
$dbname = 'pdoposts';

// Set DSN || DATA SOURCE NAME
$dsn = "mysql:host=${host};dbname=${dbname}";

// Create PDO instance
$pdo = new PDO($dsn, $user, $password);

# PDO Query
$stmt = $pdo->query('SELECT * FROM posts');

while($row = $stmt->fetch(PDO::FETCH_ASSOC)){ // => Fetch Associative Array
  echo "${row['title']} <br>";
}

while($row = $stmt->fetch(PDO::FETCH_OBJ)){ // => Fetch Object
  echo $row->body . "<br>";
}

# You can set a default to PDO::FETCH_ mode
$pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);

# PREPARED STATEMENT (prepare & execute)

// USER INPUT
$author = 'Brad';
$is_published = true;

// UNSAFE => can insert SQL instructions into query through $author variable
$sql = "SELECT * FROM posts WHERE author = '$author'";

# Two ways to use prepared statement POSITIONAL PARAMS (same as mysqli) and NAMED PARAMS

// POSITIONAL PARAMETERS
$sql = "SELECT * FROM posts WHERE author = ?"; // ? placeholder
$stmt = $pdo->prepare($sql);
$stmt->execute([$author]);
$posts = $stmt->fetchAll();

foreach($posts as $post){
  echo $post->title . "<br>";
}

// NAMED PARAMETERS
$sql = "SELECT * FROM posts WHERE author = :author && is_published = :is_published"; // :var placeholder
$stmt = $pdo->prepare($sql);
$stmt->execute(['author' => $author, 'is_published' => $is_published]); // use ASSOC array
$posts = $stmt->fetchAll();
