
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
</head>
<body>
<h2>date(format, <i>timestamp</i>)</h2> 
<ul>
  <li>d - Represents the day of the month (01 to 31)</li>
  <li>m - Represents a month (01 to 12)</li>
  <li>Y - Represents a year (in four digits)</li>
  <li>l (lowercase 'L') - Represents the day of the week</li>
</ul>

<?php
echo "Today is " . date("Y/m/d") . "<br>";
echo "Today is " . date("Y.m.d") . "<br>";
echo "Today is " . date("Y-m-d") . "<br>";
echo "Today is " . date("l") . "<br>";
?>
&copy; 2010-<?php echo date("Y");?>

<h2>Time</h2>
<p>If you need the time to be correct according to a specific location, you can set a timezone to use.</p>

<?php
date_default_timezone_set("America/New_York");
echo "The time is " . date("h:i:sa");
?>

<p>The optional timestamp parameter in the date() function specifies a timestamp. If you do not specify a timestamp, the current date and time will be used (as shown in the examples above).</p>

<?php
$d=mktime(11, 14, 54, 8, 12, 2014);
echo "Created date is " . date("Y-m-d h:i:sa", $d);
?>

<p>The PHP strtotime() function is used to convert a human readable string to a Unix time.</p>

<?php
$d=strtotime("10:30pm April 15 2014");
echo "Created date is " . date("Y-m-d h:i:sa", $d);
?>

<p>PHP is quite clever about converting a string to a date, so you can put in various values:</p>

<?php
$d=strtotime("tomorrow");
echo date("Y-m-d h:i:sa", $d) . "<br>";

$d=strtotime("next Saturday");
echo date("Y-m-d h:i:sa", $d) . "<br>";

$d=strtotime("+3 Months");
echo date("Y-m-d h:i:sa", $d) . "<br>";
?>

<p>The example below outputs the dates for the next six Saturdays:</p>

<?php
$startdate = strtotime("Saturday");
$enddate = strtotime("+6 weeks", $startdate);

while ($startdate < $enddate) {
  echo date("M d", $startdate) . "<br>";
  $startdate = strtotime("+1 week", $startdate);
}
?>
<br>
<?php
$d1=strtotime("December 04");
$d2=ceil(($d1-time())/60/60/24);
echo "There are " . $d2 ." days until 4th of July.";
?>

</body>
</html>
