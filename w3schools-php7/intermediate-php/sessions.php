<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sessions</title>
</head>
<body>
	
	<h2>
		Sessions
	</h2>
	<p>
		A session is a way to store information (in variables) to be used across multiple pages.
	</p>
	<P>
		Unlike a cookie, the information is not stored on the users computer.
	</P>
	<p>
		If you need a permanent storage, you may want to store the data in a database.
	</p>
	
	<h2>
		Start session with: <code>session_start();</code>
	</h2>
<?php session_start(); ?>
	<p>
		Set session variable with <code>$_SESSION["variable-name"] = "value";</code>
	</p>
<?php
	// Set session variables
	$_SESSION["favcolor"] = "green";
	$_SESSION["favanimal"] = "LOL CAT";
	echo "Session variables are set. <br>";
	echo "Session favcolor is: " . $_SESSION['favcolor'] . "<br>";
	echo "Session favanimal is: " . $_SESSION['favanimal']  . "<br>";
?>
	<h2>
		To change a session variable, just overwrite it: 
	</h2>
	<p>
		<code>$_SESSION["favcolor"] = "yellow";</code>
	</p>
	
<?php 
	$_SESSION["favcolor"] = "yellow";
	print_r($_SESSION);
?>
	<h2>
		To Destroy a php Session use: 
	</h2>
	<p>
		<code>session_unset()</code><br>
		<code>session_destroy()</code>
	</p>
<?php
	session_unset();
	session_destroy();
	echo $_SESSION["favanimal"];
?>
	
</body>
</html>