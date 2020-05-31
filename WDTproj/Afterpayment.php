
<?php
require 'header.php';
include 'conn.php';
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Payment Success!</title>
    <style>
    #background {
      background-image: url("images/minimalbackground.png");
      background-color: black;
      width: 100%;
      height: 100%;
    }
    </style>
  </head>
  <body id='background'>
    <?php
    $SelectUserid = "SELECT account.User_ID, cart.Quantity, cart.Cart_Price FROM account
                     JOIN cart
                     ON account.User_ID = cart.User_ID
                     WHERE Username = '".$_SESSION['username']."'";

    $resultUserid = mysqli_query($conn, $SelectUserid);
    $rows = mysqli_fetch_array($resultUserid);
    $Userid = $rows['User_ID'];

    $mi = new MultipleIterator();
    $mi->attachIterator(new ArrayIterator($_POST['LN-NO']));
    $mi->attachIterator(new ArrayIterator($_POST['LN-Quantity']));
    $mi->attachIterator(new ArrayIterator($_POST['LN-Price']));

foreach ( $mi as $whole ) {
    list($LN_NO, $LN_Quantity, $Receipt_Price) = $whole;
    $TotalReceiptPrice = $LN_Quantity * $Receipt_Price;

    $sql = "INSERT INTO receipt (LN_NO, User_ID, Quantity, Receipt_Price)

    VALUES

    ('$LN_NO', '$Userid' , '$LN_Quantity' , '$TotalReceiptPrice')";
    $result = mysqli_query($conn, $sql);


    $sql2 = "UPDATE lnovels
             SET LN_Total = LN_Total - '".$LN_Quantity."'
             WHERE LN_NO = '".$LN_NO."'";
    $result2 = mysqli_query($conn, $sql2);
}

  /*  foreach (array_combine($_POST['LN-NO'], $_POST['LN-Quantity']) as $LN_NO => $LN_Quantity) {

    $sql = "INSERT INTO receipt (LN_NO, User_ID, Quantity, Receipt_Price)

    VALUES

    ('$LN_NO', '$Userid' , '$LN_Quantity' , '$Receipt_Price')";
    $result = mysqli_query($conn, $sql);

}*/

    ?>
    <?php
    foreach ($_POST['cart-id'] as $CARTID) {
      $sql = "DELETE FROM cart WHERE Cart_ID = '".$CARTID."'";
      $result = mysqli_query($conn, $sql);
    }

    if(mysqli_affected_rows($conn) <= 0)
    {
        echo "<script>alert('Error!');";
        die ("window.location.href='homepage.php';</script>");
    }


        echo "<script>alert('Payment Success!');</script>";
        echo "<script>window.location.href='homepage.php';</script>";
        if (!mysqli_query($conn, $sql)) {
        die('Error: ' .mysqli_error($conn));
      }

        mysqli_close($conn);
    ?>
  </body>
</html>
