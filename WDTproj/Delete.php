<?php
include "conn.php";
?>

<?php
$sql = "DELETE FROM News WHERE News_ID = '".$_POST['NewsID']."'";
$result = mysqli_query($conn, $sql);
if(mysqli_affected_rows($conn) <= 0)
{
    echo "<script>alert('Unable to delete data!');";
    die ("window.location.href='homepage.php';</script>");
}
    mysqli_close($conn);

    echo "<script>alert('Data deleted!');</script>";
    echo "<script>window.location.href='homepage.php';</script>";
?>
