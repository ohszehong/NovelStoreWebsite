<?php
include("conn.php");

$target_dir = "images/";
//the basename($_FILES["photo"]["name"]) means to get the basename (e.g. test.docx) //from the file path (e.g. D://images/test.docx)
$target_file = $target_dir . basename($_FILES["NewsImage"]["name"]);
//to get the extension of the file (e.g docx)
$imageFileType = pathinfo ($target_file, PATHINFO_EXTENSION);

//check if image file is a actual image or fake image
$check = getimagesize($_FILES["NewsImage"]["tmp_name"]);
if($check !== false)
{  echo "<script>alert('File is an image - " . $check["mime"] . ".');</script>"; }
else  {
   echo "<script>alert('File is not an image.Please try again!');</script>";
   die("<script>window.history.go(-1);</script>");
  }

//Allow certain file formats
if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" )
{
  echo "<script>alert('Sorry, only JPG, JPEG, PNG & GIF files are allowed.Please try again!');</script>";
  die("<script>window.history.go(-1);</script>");
}

//move the file using move_uploaded_file function.
//if not success transfer, give alert message!
if (! move_uploaded_file($_FILES["NewsImage"]["tmp_name"],$target_file)) {
  echo "<script>alert('Unable to upload photo.Thus, data will not be inserted to database. Please try again!');</script>";
  die("<script>window.history.go(-1);</script>");
}

echo "<script>alert('The file ". basename($_FILES["NewsImage"]["name"])." has been uploaded.');</script>";

$NewsTitle = mysqli_real_escape_string($conn , $_POST['NewsTitle']);
$NewsText = mysqli_real_escape_string($conn , $_POST['NewsText']);

$sql="INSERT INTO news (News_Title, News_Text, News_Image)
VALUES
('$NewsTitle','$NewsText', '$target_file')";

if(!mysqli_query($conn,$sql))
{
die('Error:'.mysqli_error($conn));
}

echo'<script>alert("1 record added!");
window.location.href = "homepage.php";
</script>';

mysqli_close($conn);
?>
