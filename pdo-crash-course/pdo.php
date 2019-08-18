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
$id = 1;

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

// FETCH SINGLE POST
$sql = "SELECT * FROM posts WHERE id = :id"; // :var placeholder
$stmt = $pdo->prepare($sql);
$stmt->execute(['id' => $id]);  // use ASSOC array
$post = $stmt->fetch();        // fetch for single

echo $post->body . "<br>";

// GET ROW COUNT
$stmt = $pdo->prepare("SELECT * FROM posts WHERE author = :author");
$stmt->execute(['author' => $author]);
$postCount = $stmt->rowCount();

echo $postCount . "<br>";

// INSERT DATA
$title = 'Post six';
$body = 'This is the body of post six';
$author = 'Kevin';

$sql = "INSERT INTO posts(title, body, author) VALUES(:title, :body, :author)";
$stmt = $pdo->prepare($sql);
$stmt->execute(['title' => $title, 'body' => $body, 'author' => $author]);
echo 'Post Added <br>';

// UPDATE DATA
$id = 6;
$body = 'This is the updated body of post six';

$sql = "UPDATE posts SET body = :body WHERE id = :id";
$stmt = $pdo->prepare($sql);
$stmt->execute(['body' => $body, 'id' => $id]);
echo 'Post Updated <br>';

// DELETE DATA
$id = 3;

$sql = "DELETE FROM posts WHERE id = :id";
$stmt = $pdo->prepare($sql);
$stmt->execute(['id' => $id]);
echo 'Post Deleted <br>';

// SEARCH DATA
$search = "%post%";

$sql = 'SELECT * FROM posts WHERE title LIKE ?';
$stmt = $pdo->prepare($sql);
$stmt->execute([$search]);
$posts = $stmt->fetchAll();

foreach($posts as $post){
  echo $post->title . '<br>';
}