<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cookies</title>
</head>
<body>

	<h2>setcookie(name, value, expire, path, domain, secure, httponly);</h2>
	
<?php
	$cookie_name = "user";
	$cookie_value = "John Doe";
	setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/"); //86400 = 1day
?>
	
	<h2>Check if isset</h2>
<?php
	if(!isset($_COOKIE[$cookie_name])) {
		echo "Cookie named ${cookie_name} is not set!" ;
	} else {
		echo "Cookie named ${cookie_name} is set! <br>";
		echo "Value is: " . $_COOKIE[$cookie_name];
	}
?>

	<h2>Resset cookie to modify it.</h2>
	
<?php
	$cookie_name = "user";
	$cookie_value = "Matthijs Boet";
	setcookie($cookie_name, $cookie_value, time() * (86400 *30), "/"); // "/" cookie available in entire website
?>
<?php	
	echo "Cookie named ${cookie_name} is set! <br>";
	echo "Value is: " . $_COOKIE[$cookie_name];
	
?>
	<h2>Delete cookie by setting time to negative number</h2>
<?php
	setcookie("user", "", time() - 3600);
	echo "user cookie deleted";
?>
	<h2>Check if cookies are enabled by creating test cookie and check if isset</h2>	
<?php setcookie("test_cookie", "test", time() + 3600, '/'); ?>
<?php
	if(count($_COOKIE) > 0) {
		echo "Cookies enabled";
	} else {
	echo "Cookies disabled";
	}
?>
	
</body>
</html>

