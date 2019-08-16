<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
  <style>
    tr:nth-child(even) {background: #CCC}
  </style>
</head>
<body>
<?php

// echo readfile("webdictionary.txt");

# better option is fopen which gives you more options
try {
  $myfile = fopen("webdictionary.txt", "r");
  // some code to be executed....

  # close open file fclose
  fclose($myfile); 
} catch (Exception $e){
  echo "Error message: " . $e->getMessage();
}

# read a single line from a file
  // some code to be executed => fgets
  echo fgets($myfile);

# checks if the "end-of-file" (EOF) has been reached
  // some code to be executed => feof
  while(!feof($myfile)) {
    echo fgets($myfile) . "<br>";
  }

# read a single character from a file
  // some code to be executed => fgetc
  // Output one character until end-of-file
  while(!feof($myfile)) {
    echo fgetc($myfile);
  }
  fclose($myfile);



?>
<table class="w3-table-all notranslate">
  <tbody><tr>
    <th style="width:10%">Modes</th>
    <th style="width:90%">Description</th>
  </tr>
  <tr>
    <td>r</td>
    <td><strong>Open a file for read only</strong>. File pointer starts at the beginning of the file</td>
  </tr>
    <tr>
    <td>w</td>
    <td><strong>Open a file for write only</strong>. Erases the contents of the file or creates a new file if it doesn't exist. File pointer starts at the beginning of the file</td>
    </tr>
  <tr>
    <td>a</td>
    <td><strong>Open a file for write only</strong>. The existing data in file is preserved. File pointer starts at the end of the file. Creates a new file if the file doesn't exist</td>
    </tr>
  <tr>
    <td>x</td>
    <td><strong>Creates a new file for write only</strong>. Returns FALSE and an error if file already exists</td>
    </tr>
  <tr>
    <td>r+</td>
    <td><strong>Open a file for read/write</strong>. File pointer starts at the beginning of the file</td>
  </tr>
  <tr>
    <td>w+</td>
    <td><strong>Open a file for read/write</strong>. Erases the contents of the file or creates a new file if it doesn't exist. File pointer starts at the beginning of the file</td>
  </tr>
  <tr>
    <td>a+</td>
    <td><strong>Open a file for read/write</strong>. The existing data in file is preserved. File pointer starts at the end of the file. Creates a new file if the file doesn't exist</td>
  </tr>
  <tr>
    <td>x+</td>
    <td><strong>Creates a new file for read/write</strong>. Returns FALSE and an error if file already exists</td>
  </tr>
</tbody></table>

</body>
</html>

