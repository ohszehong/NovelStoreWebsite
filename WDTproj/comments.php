<?php
  require 'header.php';
  include 'conn.php';
?>

<?php

$sql = "SELECT * FROM account WHERE Username = '".$_SESSION['username']."'";
$result = mysqli_query($conn, $sql);
$rows = mysqli_fetch_array($result);

$Userid = $rows['User_ID'];

$comment_text = mysqli_real_escape_string($conn , $_POST['comments']);
$todaydate = date("Y-m-d");
$LN_NO = $_POST['LNnumber'];
$commentlink = mysqli_real_escape_string($conn , $_POST['currentlink']);


  $sql = "INSERT INTO comments (User_ID, Comment_Text, Comment_Date, Comment_Link, LN_NO)

          VALUES

          ('$Userid', '$comment_text', '$todaydate', '$commentlink', '$LN_NO')";

  echo "<script>alert('Comment Success!');</script>";
  echo "<script>window.location.href='".$commentlink."';</script>";


if (!mysqli_query($conn, $sql)) {
die('Error: ' .mysqli_error($conn));
}

mysqli_close($conn);

?>
