<?php
include 'conn.php';
session_start();
session_write_close();


$sql = "SELECT * FROM account WHERE Username = '".$_SESSION['username']."'";
$result = mysqli_query($conn, $sql);
$rows = mysqli_fetch_array($result);

$CurrentPassword = $rows['Password'];
$CurrentFN = $rows['First_Name'];
$CurrentLN = $rows['Last_Name'];
$CurrentEmail = $rows['Email'];



if ($_POST['FirstName'] == !NULL) {
  $FirstName = mysqli_real_escape_string($conn , $_POST['FirstName']);
}
else {
  $FirstName = $CurrentFN;
}

if ($_POST['LastName'] == !NULL) {
  $LastName = mysqli_real_escape_string($conn , $_POST['LastName']);
}
else {
  $LastName = $CurrentLN;
}

if ($_POST['NewEmail'] == !NULL) {
  $NewEmail = mysqli_real_escape_string($conn , $_POST['NewEmail']);
}
else {
  $NewEmail = $CurrentEmail;
}


$sql = "UPDATE account
        SET First_Name = '".$FirstName."',
            Last_Name = '".$LastName."',
            Email = '".$NewEmail."'
            WHERE Username = '".$_SESSION['username']."'";

  if(!mysqli_query($conn,$sql))
  {
  die('Error:'.mysqli_error($conn));
  }

echo'<script>alert("Updated!");
window.location.href = "profile.php";
</script>';


mysqli_close($conn);
?>
