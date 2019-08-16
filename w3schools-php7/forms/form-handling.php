<html>
<body>

<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
Name: <input type="text" name="name"><br>
E-mail: <input type="text" name="email"><br>
<input name="submit" type="submit">
</form>
<?php
$submit = $_POST["submit"] ?? '';

if(!empty($submit)){
  echo "Welcome ${$_POST['name']} <br>";
  echo "Your email address is: ${$_POST['email']}";
}
?>

</body>
</html>