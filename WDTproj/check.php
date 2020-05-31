<?php
session_start();
?>

<?php
include 'conn.php';
?>

<?php
$username = mysqli_real_escape_string($conn , $_POST['username']);
$password = mysqli_real_escape_string($conn , $_POST['password']);

$sql = "Select * from account where Username = '".$username."' and Password = '".md5($password)."'";

$result = mysqli_query($conn , $sql);

$rows = mysqli_fetch_array($result);

if(mysqli_num_rows($result)<=0)
{
    echo "<script>alert('Wrong username / password !Please Try Again!');";
    die("window.history.go(-1);</script>");
}

else
{
  $_SESSION['username'] = $rows['Username']; //use session
  $_SESSION['password'] = $rows['Password'];
  $_SESSION['role'] = $rows['User_Role'];
  echo "<script>window.location.href='homepage.php';</script>";
}

session_write_close();

?>
