<?php
require 'header.php';
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>CART</title>
    <link rel="stylesheet" type="text/css" href="AddtoCart.css">
  </head>
  <body id='background'>


    <?php
    include("conn.php");
    ?>

    <?php
    $sql = "SELECT User_ID FROM account WHERE Username = '".$_SESSION['username']."'";
    $result = mysqli_query($conn, $sql);
    $rows = mysqli_fetch_array($result);

    if (isset($_SESSION['username'])) {
      if(isset($_POST['addtocart'])){
      $sql = "INSERT INTO cart (LN_NO, User_ID, Quantity, Cart_Price)

      VALUES

      ('$_POST[BookID]', '$rows[User_ID]', '$_POST[quantity]', '$_POST[quantity]'*'$_POST[BookPrice]')";

      echo "<script>";
      echo "alert('ADDED TO CART!');";
      echo "window.history.go(-1);";
      echo "</script>";
    }

  }
    else
    {
      /*echo "<script>";
      echo "alert('Please login to purchase!');";
      echo "window.location.href= 'login.php';";
      echo "</script>";*/
    }


    if (!mysqli_query($conn, $sql)) {
      die('Error:' .mysqli_error($conn));
    }

    ?>

    <div class="wrapper">
    <p id='selected_Desc'>
      <?php

        $sql = "SELECT Cart_ID FROM cart JOIN account
                ON cart.User_ID = account.User_ID
                WHERE account.Username = '".$_SESSION['username']."'";

        $result = mysqli_query($conn, $sql);

        $totalitems = mysqli_num_rows($result);

        echo " You have ".$totalitems." item(s) in the cart";

        echo "<div id='RemoveAll'><a href='RemoveAll.php'>REMOVE ALL FROM CART</a></div>";


       ?>
    </p>
    <!-- select all boxes -->
  <div class="selectAll">
    <form id='select-all-form' action="AddtoCart.php" method="post">
      <?php
      echo "<input id='select_all' type='checkbox' onclick='toggle(this);' name='select-all'";
      if (isset($_POST['select-all'])) {
        echo "checked='checked'>";
      }
      else {
        echo ">";
      }

      ?>
      <label for="select_all" id="select_all_label">Select All</label>
    </form>
    </div>



    <script>
    function toggle(source) {
        var checkboxes = document.querySelectorAll('input[type="checkbox"]');
        for (var i = 0; i < checkboxes.length; i++) {
            if (checkboxes[i] != source)
                checkboxes[i].checked = source.checked;
        }
    }
    </script>


      <div class="cartcontainer">




        <?php
        $sql = "SELECT cart.LN_NO, cart.User_ID, lnovels.LN_Name, lnovels.LN_Author, lnovels.LN_Price, lnovels.LN_Image, account.Username, lnovels.LN_Total, cart.Quantity, cart.Cart_ID
                FROM cart
                JOIN lnovels
                ON cart.LN_NO = lnovels.LN_NO
                JOIN account
                ON cart.User_ID = account.User_ID
                WHERE
                account.Username = '".$_SESSION['username']."'";

        $result = mysqli_query($conn, $sql);

        if (!mysqli_query($conn, $sql)) {
          die('Error:' .mysqli_error($conn));
        }


        echo "<div class='order'>";
        echo "<form action='AddtoCart2.php#' method='POST' id='checkboxform' name='checkboxesform'>";


        while ($rows = mysqli_fetch_array($result)) {
        echo "
        <div id='orderitem'>
        <input type='hidden' name='LN-Price' value=".$rows['LN_Price'].">
        <input type='hidden' name='LN-Name[]' value=".$rows['LN_Name'].">
        <input type='hidden' name='LN-NO' value=".$rows['LN_NO'].">
        <input type='hidden' name='Cart-ID' value=".$rows['Cart_ID'].">
        ";
        ?>
        <?php

          echo "<input id='checkbox".$rows['Cart_ID']."'";


        ?>
        <?php

        echo "class='checkbox'
              type='checkbox' name='check[]'
              value=".$rows['LN_Price']."
              onchange='this.form.submit()'>";

        ?>

        <?php
        echo "
        <span id='customcheckbox'></span>
        <a class='novellink' id='novel' href='Details.php?".$rows['LN_NO']."=".$rows['LN_Name']."'>
        <img src=".$rows['LN_Image'].">
        </a>
        <div id='itemdetails'>
        <p>".$rows['LN_Name']."</p>
        <br>
        BookID:&nbsp;".$rows['LN_NO']."
        <br>
        <br>
        Author:&nbsp;".$rows['LN_Author']."
        <br>
        <br>
        Price:&nbsp;RM".$rows['LN_Price']."
        <br>
        <br>
        Quantity:&nbsp;".$rows['Quantity']."

        <input type='hidden' name='ID' value=".$rows['Cart_ID'].">
        <input id='remove' type='submit' value='Remove' formaction='RemoveItem.php'>
        </div>
        </div>

        ";
      }

      echo "</form>";
      echo "</div>";

        ?>



        <form>
        <div class="PriceBox" style="overflow-y:auto;">
          <br>
          <div>
          <label id='TotalPrice'>Order Summary</label>
      </div>
      <div id='itemlist' style="padding-top:20px;">
          <?php

          if (isset($_POST['check'])) {
             $Subitems = count($_POST['check']);
              echo "SubTotal";
              echo "&nbsp";
              echo "(".$Subitems."&nbsp;items)";
            }
          else {
            echo "SubTotal";
            echo "&nbsp";
            echo "(0 items)";
          }
          echo "<p style='float:right;margin:0;'>";
            if (isset($_POST['check'])) {
            echo "RM".array_sum($_POST['check'])."";
          }
          else {
            echo "RM 0.00";
          }
          echo "</p>";


          ?>
      <br>
      <br>
      <?php
      echo "Shipping Fee";
      echo "<p style='float:right;margin:0;'>";
      echo "RM";
      if (isset($_POST['check'])) {
      $ShippingFee = $Subitems * 1.00;
      echo $ShippingFee;
    }
    else {
      echo "0.00";
    }
    echo "</p>";
      ?>
      <br>
      <br>
      <br>
      <form action="AddtoCart.php" method="POST" style="padding-left:10px;">

        <input type="text" style="width:75%;" placeholder="Enter voucher code...">
        <input type="submit" style="width:20%;" value="APPLY">

      </form>
      <br>
      <br>
      <br>
      <?php

      echo "Total";
      echo "<p style='float:right;margin:0;font-size:1.4em;color:orange;'>";
      if (isset($_POST['check'])) {
      echo "RM";
      echo array_sum($_POST['check']) + $ShippingFee;
    }
    else {
      echo "RM0.00";
    }
    echo "</p>";
       ?>
      <br>
      <br>
      <p style="float:right;margin:0;font-size:0.8em;">
      GST 0%
    </p>
    <br>
    <br>
    <br>
    <input type="submit" value="PROCEED TO CHECKOUT" id="CheckOut" formaction="Payment.php">
      </div>
    </div>
  </form>




<script src="https://code.jquery.com/jquery-2.2.3.min.js"></script>



<script>
var checkboxValues = JSON.parse(localStorage.getItem('checkboxValues')) || {};
var $checkboxes = $("#checkboxform :checkbox");

$checkboxes.on("change", function(){
  $checkboxes.each(function(){
    checkboxValues[this.id] = this.checked;
  });
  localStorage.setItem("checkboxValues", JSON.stringify(checkboxValues));
});

$.each(checkboxValues, function(key, value) {
  $("#" + key).prop('checked', value);
});
</script>





  </body>
</html>
