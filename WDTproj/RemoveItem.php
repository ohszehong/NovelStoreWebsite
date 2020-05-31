<?php
include "conn.php";
?>

<?php
$sql = "DELETE FROM cart WHERE Cart_ID = '".$_POST['ID']."'";
$result = mysqli_query($conn, $sql);
if(mysqli_affected_rows($conn) <= 0)
{
    echo "<script>alert('Unable to delete data!');";
    die ("window.location.href='AddtoCart.php';</script>");
}
    mysqli_close($conn);

    echo "<script>alert('Remove from Cart!');</script>";
    echo "<script>window.location.href='AddtoCart.php';</script>";
?>
