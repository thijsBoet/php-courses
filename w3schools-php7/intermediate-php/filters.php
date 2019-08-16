<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Filters</title>
</head>
<body>
	<h2>
		Filters
	</h2>
	<p>
		Validating data = Determine if the data is in proper form.
	</p>
	<p>
		Sanitizing data = Remove any illegal character from the data.
	</p>
	<p>
		PHP filters are used to validate and sanitize external input.
	</p>

	<hr>
	<p>
		The <code>filter_list()</code> function can be used to list what the PHP filter extension offers:
	</p>

	<table>
	  <tr>
		<td>Filter Name</td>
		<td>Filter ID</td>
	  </tr>
<?php
foreach (filter_list() as $id =>$filter) {
  echo '<tr><td>' . $filter . '</td><td>' . filter_id($filter) . '</td></tr>';
}
?>
	</table>
	<hr>
	<p>
		<code>The filter_var($variable, FILTER_VALIDATE_TYPE, <i>flag</i>)</code> function both validate and sanitize data.
	</p>
<?php
	
$int = 100;
if (filter_var($int, FILTER_VALIDATE_INT)) 		echo("Integer is valid <br>");
	
$ip = "127.0.0.1";
if (filter_var($ip, FILTER_VALIDATE_IP))		echo("$ip is a valid IP address<br>");
	
$email = "john.doe@example.com";
if (filter_var($email, FILTER_VALIDATE_EMAIL))	echo("$email is a valid email address<br>");
	
$url = "https://www.w3schools.com";
if (filter_var($url, FILTER_VALIDATE_URL))		echo("$url is a valid URL<br>");
	
$int = 122;
$min = 1;
$max = 200;
	
if (filter_var($int, FILTER_VALIDATE_INT, array("options" => array("min_range"=>$min, "max_range"=>$max))) === false) echo("Variable value is not within the legal range<br>");
	
$ip = "2001:0db8:85a3:08d3:1319:8a2e:0370:7334";
if (filter_var($ip, FILTER_VALIDATE_IP, FILTER_FLAG_IPV6))	echo("$ip is a valid IPv6 address");
	
$url = "https://www.w3schools.com?type=php";
if (!filter_var($url, FILTER_VALIDATE_URL, FILTER_FLAG_QUERY_REQUIRED) === false)	echo("$url is a valid URL with a query string");
?>
<p>It will both remove all HTML tags, and all characters with ASCII value > 127, from the string<p>
<?php
$str = "<h1>Hello WorldÆØÅ!</h1>";
$newstr = filter_var($str, FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH);	
echo $newstr;
	

?>
	

	
	
</body>
</html>