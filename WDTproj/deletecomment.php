<?php
include "conn.php";
?>

<?php
$sql = "DELETE FROM comments WHERE Comment_ID = '".$_POST['Comment-ID']."'";
$result = mysqli_query($conn, $sql);
if(mysqli_affected_rows($conn) <= 0)
{
    echo "<script>alert('Unable to delete data!');";
    die ("window.history.go(-1);</script>");
}
    mysqli_close($conn);

    echo "<script>alert('Comment Deleted!');</script>";
    echo "<script>window.history.go(-1);</script>";
?>
