<?php
include 'conn.php';
?>
<?php
require 'header.php';
?>


<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Details</title>
    <link rel="stylesheet" type="text/css" href="Details.css">
  </head>
  <body id="background">

    <div class="wrapper">
    <div class="container">
        <?php

        $LN = (key($_GET));
        $sql = "SELECT * FROM lnovels WHERE LN_NO = ".$LN."";
        $result = mysqli_query($conn , $sql);


        if ((key($_GET)) == NULL) {
          echo "<script>alert('Key not found, back to All.php!');";
          echo "window.location.href='All.php';</script>";
        }


        while($rows = mysqli_fetch_array($result)) {
          if ($LN == $rows['LN_NO']){
            echo "



              <div class=item1>
            <div class='mainln'>
            <img src=".$rows['LN_Image'].">
            </div>

            </div>


            <div class=item2>


              <div class=BookTitle>
              ".$rows['LN_Name']."
              </div>
              <br>
              <br>
              <div id=description>
              <form action='AddtoCart.php' method='POST'>
              <input type='hidden' name='BookName' value=".$rows['LN_Name'].">
              <input type='hidden' name='BookPrice' value=".$rows['LN_Price'].">
              <input type='hidden' name='BookImage' value=".$rows['LN_Image'].">
              <input type='hidden' name='BookID' value=".$rows['LN_NO'].">
              BookID:&nbsp;".$rows['LN_NO']."
              <br>
              <br>
              Author:&nbsp;".$rows['LN_Author']."
              <br>
              <br>
              Price:&nbsp;RM".$rows['LN_Price']."
              <br>
              <br>
              Genres:&nbsp;".$rows['LN_Category_1'].",  ".$rows['LN_Category_2']."
              <br>
              <br>
              Summary: ".$rows['LN_Summary']."
              <br>
              <br>
              Stock Left: ".$rows['LN_Total']."
              <span id='quantity'>Quantity:</span><input id='number' type='number' name='quantity' min='1' max=".$rows['LN_Total']." value='1'>";
              ?>

              <?php
              if ($rows['LN_Total'] == 0) {
                echo "<div id='OutOfStock' name='outofstock'>OUT OF STOCK</div>";
              }
              else {
              echo "
              <input id='AddtoCart' type='submit' name='addtocart' value='ADD TO CART'>";
            }
            echo
            "</form>
             </div>
             </div>";
          }
          else {
            echo "<script>alert('Invalid BookID!');</script>";
          }


        }

        ?>

      </div>
      <?php
          echo "<p id='similardesc'>Comments:</p>";
          echo "<div class='metaitem'>";

      ?>
      <?php
      //user post comments
      if (isset($_SESSION['username'])) {

      $sql = "SELECT * FROM account WHERE Username = '".$_SESSION['username']."'";
      $result = mysqli_query($conn, $sql);
      $rows = mysqli_fetch_array($result);
      $Userpic = $rows['User_image'];


      $currentlink = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

      echo "<div class='metaitemitem'>";
      echo "<div id='profilepic'><img src='".$Userpic."'></div>";
      echo "<form action='comments.php' method=POST>";
      echo "<textarea name='comments' id='comments' placeholder='Enter comments...'></textarea>";
      echo "<input type='submit' value='Post Comments' id='postcomments' name='postcomments'>";
      echo "<input type='hidden' name='currentlink' value='".$currentlink."'>";
      echo "<input type='hidden' name='LNnumber' value='".$LN."'>";
      echo "</form>";
      echo "</div>";
}

    if (isset($_SESSION['username'])) {

      $sql = "SELECT * FROM comments
              JOIN account
              ON comments.User_ID = account.User_ID
              WHERE comments.Comment_Link = '".$currentlink."'
              ORDER BY Comment_Date DESC";

      $result = mysqli_query($conn, $sql);


          while ($rows = mysqli_fetch_array($result)) {

            echo "<div class='metaitemitem'>";
            echo "<div id='profilepic'><img src='".$rows['User_image']."'></div>";
            echo "<div id='commentsblock'>";

            ?>


            <?php
            if ($rows['User_Role'] == 0) {
              echo "<p id='username'>".$rows['Username']."&nbsp;(ADMIN)</p>";
            }
            else {
              echo "<p id='username'>".$rows['Username']."</p>";
            }
            ?>

            <?php
            if ($rows['Username'] == $_SESSION['username'] || $_SESSION['role'] == '0') {
              echo "<form action='deletecomment.php' method='post'>

                    <input type='hidden' value='".$rows['Comment_ID']."' name='Comment-ID'>
                    <center><input type='submit' id='deletecomment' value='DELETE COMMENT'></center>

                    </form>";
            }

            echo "<p>".$rows['Comment_Text']."</p>";
            echo "<p id='date'>".$rows['Comment_Date']."</p>";
            echo "</div>";
            echo "</div>";

          }
            echo "</div>";
          }
          else {
            echo "<center id='center'><a id='loginpls' href='login.php'>LOGIN TO SEE COMMENTS</a></center>";
          }
           ?>
        <?php



         ?>

      </div>


  </body>
</html>
