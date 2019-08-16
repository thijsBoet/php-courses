<?php
// define variables and set to empty values
$name = $email = $gender = $comment = $website = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $name = test_input($_POST["name"]);
  $email = test_input($_POST["email"]);
  $website = test_input($_POST["website"]);
  $comment = test_input($_POST["comment"]);
  $gender = test_input($_POST["gender"]);
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

$nameErr = $emailErr = $genderErr = $websiteErr = "";
$name = $email = $gender = $comment = $website = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["name"])) {
      $nameErr = "* Name is required";
  }
  if (!preg_match("/^[a-zA-Z ]*$/", $name)) {
      $nameErr = "Only letters and white space allowed";
  }
  $name = test_input($_POST["name"]);

  if (empty($_POST["email"])) $emailErr = "* Email is required";
  if (!filter_var($email, FILTER_VALIDATE_EMAIL)) $emailErr = "Invalid email format"; 
  $email = test_input($_POST["email"]);

  if (empty($_POST["website"])) $website = "";
  if (!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i",$website)) $websiteErr = "Invalid URL"; 
  $website = test_input($_POST["website"]);


  if (empty($_POST["comment"])) {
    $comment = "";
  } else {
    $comment = test_input($_POST["comment"]);
  }

  if (empty($_POST["gender"])) {
    $genderErr = "* Gender is required";
  } else {
    $gender = test_input($_POST["gender"]);
  }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Form Validation</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>
<body>
  <div class="container mt-5">
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
      <div class="form-group">
        <label for="name">Name *</label>
        <input type="text" class="form-control" name="name" id="name"  value="<?php echo $name;?>">
        <span class="error"><?php echo $nameErr;?></span>
      </div>
      <div class="form-group">
        <label for="email">E-mail *</label>
        <input type="email" class="form-control" name="email" id="email" value="<?php echo $email;?>">
        <span class="error"><?php echo $emailErr;?></span>
      </div>
      <div class="form-group">
        <label for="website">Website</label>
        <input type="text" class="form-control" name="website" id="website" value="<?php echo $website;?>">
        <span class="error"><?php echo $websiteErr;?></span>
      </div>
      <div class="form-group">
        <label for="comment">Comment</label>
        <textarea name="comment" class="form-control" rows="5" cols="40"><?php echo $comment;?></textarea>
      </div>
    
      <div class="custom-control custom-radio">
        <input type="radio" id="male" name="gender" class="custom-control-input">
        <?php if (isset($gender) && $gender=="male") echo "checked";?>
        <label class="custom-control-label" for="male">Male</label>
      </div>
      <div class="custom-control custom-radio">
        <input type="radio" id="female" name="gender" class="custom-control-input">
        <?php if (isset($gender) && $gender=="female") echo "checked";?>
        <label class="custom-control-label" for="female">Female</label>
      </div>
      <div class="custom-control custom-radio">
        <input type="radio" id="other" name="gender" class="custom-control-input">
        <?php if (isset($gender) && $gender=="other") echo "checked";?>
        <label class="custom-control-label" for="other">Other</label>
      </div>
      <span class="error"><?php echo $genderErr;?></span>
      <div class="mt-3">
        <button type="submit" class="btn btn-outline-primary btn-block">Submit</button>
      </div>
      
    </form>
  </div>

</body>
</html>