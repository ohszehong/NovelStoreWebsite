<?php
include 'conn.php';
session_start();
session_write_close();


$sql = "SELECT Password FROM account WHERE Username = '".$_SESSION['username']."'";
$result = mysqli_query($conn, $sql);
$rows = mysqli_fetch_array($result);
$sql2 = "SELECT Password FROM account";
$result2 = mysqli_query($conn, $sql2);

$CurrentPassword = $rows['Password'];

$NewPassword = mysqli_real_escape_string($conn , $_POST['NewPassword']);

while ($rows2 = mysqli_fetch_array($result2)) {
  if ($_POST['NewPassword'] == $rows2['Password']) {
    echo "<script>alert('Password taken by others!');</script>";
    echo "<script>window.location.href='profile.php';</script>";
    mysqli_close($conn);
  }
}

if ($_POST['OldPassword'] != $CurrentPassword) {
  echo "<script>alert('Incorrect Old Password!');</script>";
  echo "<script>window.location.href='profile.php';</script>";
  mysqli_close($conn);
}


else {
$sql = "UPDATE account
        SET Password = '".$NewPassword."'
        WHERE Username = '".$_SESSION['username']."'";

  if(!mysqli_query($conn,$sql))
  {
  die('Error:'.mysqli_error($conn));
  }

echo'<script>alert("Updated!");
window.location.href = "profile.php";
</script>';


mysqli_close($conn);
}
?>
