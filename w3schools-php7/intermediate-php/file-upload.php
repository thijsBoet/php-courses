<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>File Upload</title>
</head>
<body>
  <h2>Make sure in PHP.ini => file_uploads = On</h2>

  <form action="upload.php" method="post" enctype="multipart/form-data">
    Select image to upload:
    <input type="file" name="fileToUpload" id="fileToUpload">
    <input type="submit" value="Upload Image" name="submit">
</form>

<?php
# specifies the directory where the file is going to be placed
$target_dir = "uploads/";

# $target_file specifies the path of the file to be uploade
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);

# holds the file extension of the file (in lower case)
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

# check if the image file is an actual image or a fake image
$check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);

# check if the file already exists in the "uploads" folder return true if exists
file_exists($target_file)

# check the size of the file in Bytes
if ($_FILES["fileToUpload"]["size"] > 500000) {
  echo "Sorry, your file is too large.";
  $uploadOk = 0;
}

# Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
}
?>

</body>
</html>