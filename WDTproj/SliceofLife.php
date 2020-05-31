<?php
include 'conn.php';
?>


<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>LIGHT NOVELS</title>
    <link rel="StyleSheet" type="text/css" href="lightnovels.css">
    <style>
    #background {
      background-image: url("images/minimalbackground.png");
      background-color: black;
      width: 100%;
      height: 100%;
    }
    </style>
  </head>
  <body id="background">

    <?php
    require 'header.php';
    ?>

    <div class="wrapper">
      <div class="categorybox">
        <div id="dropdownmenu">
          <p>Slice of Life</p>
        </div>
        <div id="dropdown">
          <a href="All.php"><p>ALL</p></a>
          <a href="Adventure.php"><p>Adventure</p></a>
          <a href="Comedy.php"><p>Comedy</p></a>
          <a href="Horror.php"><p>Horror</p></a>
          <a href="Romance.php"><p>Romance</p></a>
          <a href="SliceofLife.php"><p>Slice of Life</p></a>
          <a href="Sci-Fi.php"><p>Sci-Fi</p></a>
          <a href="Sports.php"><p>Sports</p></a>
          <a href="Thriller.php"><p>Thriller</p></a>
        </div>
        <div id="searchbox">
          <form action="SliceofLife.php" method="post">
          <input type="image" src="images/search.png" alt="Search" id="searchbutton">
          <input type="text" name="search" placeholder="Enter Book Title/Category/Author..." id="searchtext">
        </form>
        </div>

        </div>


<div class="results">
      <?php
      $search_key = isset($_POST['search'])? $_POST['search']:'';
      $sql = "SELECT * FROM lnovels WHERE ((LN_Name LIKE '%".$search_key."%') OR (LN_Author LIKE '%".$search_key."%') OR ((LN_Category_1 LIKE '%".$search_key."%') || (LN_Category_2 LIKE '%".$search_key."%'))) AND ((LN_Category_1 = 'Slice of Life') || (LN_Category_2 = 'Slice of Life'))";
      $result = mysqli_query($conn , $sql);

      if (mysqli_num_rows($result) <= 0)
      {
        echo "<script>alert('Books Not Found, Try other category!');</script>";
        $sql = "Select * from lnovels WHERE LN_Category_1 = 'Slice of Life' || LN_Category_2 = 'Slice of Life'";
        $result = mysqli_query($conn , $sql);
        while ($rows = mysqli_fetch_array($result)) {
          echo "
          <div class=resultsbox>
          <form id='formget' action='details.php' method='GET'>
          <input type='submit' name=".$rows['LN_NO']." value=".$rows['LN_Name'].">
          <img src=".$rows['LN_Image'].">
          <div id=info>
          <p>".$rows['LN_Name']."</p>
          <br>
          Author: ".$rows['LN_Author']."
          <br>
          <br>
          Price: RM".$rows['LN_Price']."
          <br>
          <br>
          Genres: ".$rows['LN_Category_1']." , ".$rows['LN_Category_2']."
          </div>
          </form>
          </div>";
      }
      }
      else {

        while ($rows = mysqli_fetch_array($result)) {
          echo "
          <div class=resultsbox>
          <form id='formget' action='details.php' method='GET'>
          <input type='submit' name=".$rows['LN_NO']." value=".$rows['LN_Name'].">
          <img src=".$rows['LN_Image'].">
          <div id=info>
          <p>".$rows['LN_Name']."</p>
          <br>
          Author: ".$rows['LN_Author']."
          <br>
          <br>
          Price: RM".$rows['LN_Price']."
          <br>
          <br>
          Genres: ".$rows['LN_Category_1']." , ".$rows['LN_Category_2']."
          </div>
          </form>
          </div>";
      }
    }
      ?>

  </div>




  </body>
</html>
