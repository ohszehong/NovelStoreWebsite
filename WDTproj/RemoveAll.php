<?php
require 'header.php';
 ?>
<?php
include "conn.php";
?>

<?php
$countsql = mysqli_query($conn, "SELECT count(*) AS total FROM cart");
$count = mysqli_fetch_assoc($countsql);

if ($count <= 0) {
  echo "<script>alert('No item(s) in Cart!');</script>";
  //echo "<script>window.location.href='AddtoCart.php';</script>";
}
else {
$sql = "DELETE c FROM cart c
        JOIN account a
        ON c.User_ID = a.User_ID
        WHERE a.Username = '".$_SESSION['username']."'";

$result = mysqli_query($conn, $sql);

  echo "<script>alert('Remove from Cart!');</script>";
  //echo "<script>window.location.href='AddtoCart.php';</script>";
}

if (!mysqli_query($conn, $sql)) {
  die('Error:' .mysqli_error($conn));
}

mysqli_close($conn);

?>
