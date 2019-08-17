<?php require 'includes\newclass.inc.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Root</title>
</head>
<body>
  
  <?php
    $pet1 = new Pet();
    echo $pet1->owner();

    $person1 = new Person();
    echo $person1->owner();

  ?>

</body>
</html>