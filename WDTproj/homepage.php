<?php
include 'conn.php';
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Homepage</title>
    <link rel="StyleSheet" type="text/css" href="homepage.css">
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
  </head>
  <body>


    <?php
    require 'header.php';
    ?>



    <div class="featuredln">
      <div class="featuredlnpic">
        <img src="images/featuredln.png">
      </div>
      <div class="featuredlnbox">
        <div class="releasedate">
        <img src="images/release.png">
      </div>
        <div class="freegift">
          <img src="images/freegift.jpg">
        </div>
        <div class="preorder">
          <a href='Details.php?14=When sakura falls'><img src="images/preorder.jpg"></a>
        </div>
      </div>
    </div>
    <div class="content1">
    </div>




    <a name="NEWS"></a><div class="content2">

      <div class="news">
        &nbsp;&nbsp;&nbsp;NEWS
        <?php
        $sql = "SELECT * FROM News";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) <= 0)
        {
          echo "<div class='NoNews'>NO NEWS</div>";
        }
        else {
        while ($rows = mysqli_fetch_array($result)) {
          echo "
          <div class='NewsFeed'>
          <form class='Forms' action='Delete.php' method='POST'>
          <input type='hidden' name='NewsID' value=".$rows['News_ID'].">

          ".$rows['News_Title']."";
        ?>
        <?php
           if (($_SESSION == !NULL) and ($_SESSION['role'] === '0')) {
            echo "<input type='submit' id='Remove' value='Remove'>";
          }
          else {
            echo "<input id='none' type='submit' id='Remove' value='Remove'>";
          }
          ?>
        <?php
          echo "<div class='NewsFeedImage'>
          <img src=".$rows['News_Image'].">
          </div>
          ".$rows['News_Text']."
          </form>
          </div>
          ";
        }
      }

        ?>

        <?php if (($_SESSION == !NULL) and ($_SESSION['role'] === '0')) {
        echo "
        <button>
          <a href='UpdateNewsForm.php'>Update</a>
        </button>
        ";
      }
      else{
      echo "
      <button id='none'>
        Update
      </button>
      ";
    }

    ?>
      </div>



      <div class="news">
        &nbsp;&nbsp;&nbsp;EVENTS
        <?php
        $sql = "SELECT * FROM Events";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) <= 0)
        {
          echo "<div class='NoNews'>NO NEWS</div>";
        }
        else {
        while ($rows = mysqli_fetch_array($result)) {
          echo "
          <div class='NewsFeed'>
          <form class='Forms' action='Delete.php' method='POST'>
          <input type='hidden' name='EventsID' value=".$rows['Events_ID'].">

          ".$rows['Events_Title']."";
        ?>
        <?php
           if (($_SESSION == !NULL) and ($_SESSION['role'] === '0')) {
            echo "<input type='submit' id='Remove' value='Remove'>";
          }
          else {
            echo "<input id='none' type='submit' id='Remove' value='Remove'>";
          }
          ?>
        <?php
          echo "<div class='NewsFeedImage'>
          <img src=".$rows['Events_Image'].">
          </div>
          ".$rows['Events_Text']."
          </form>
          </div>
          ";
        }
      }

        ?>
        <?php if (($_SESSION == !NULL) and ($_SESSION['role'] === '0')) {
        echo "
        <button>
          <a href='UpdateEventsForm.php'>Update</a>
        </button>
        ";
      }
      else{
      echo "
      <button id='none'>
        Update
      </button>
      ";
    }

    ?>
      </div>
    </div>

    <a name="FEATURED"><div class="content3">
      <div class="intro">
      Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
      Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
    </div>
  </div></a>


    <a name="LN"></a><div class="content4">
      <div>
        <a href="All.php"><div class="novellayer">
        <p>BUY NOW</p>
      </div></a>
        <img src="images/ln1.png" data-aos="fade-up">
    </div>

      <div>
        <a href="All.php"><div class="novellayer">
          <p>BUY NOW</p>
        </div></a>
        <img src="images/ln2.jpg" data-aos="fade-up">
    </div>

      <div>
        <a href="All.php"><div class="novellayer">
          <p>BUY NOW</p>
        </div></a>
        <img src="images/ln3.jpg" data-aos="fade-up">
      </div>

      <div>
        <a href="All.php"><div class="novellayer">
          <p>BUY NOW</p>
        </div></a>
        <img src="images/ln4.png" data-aos="fade-up">
      </div>

      <div>
        <a href="All.php"><div class="novellayer">
          <p>BUY NOW</p>
        </div></a>
        <img src="images/ln5.jpg" data-aos="fade-up">
      </div>

      <div>
        <a href="All.php"><div class="novellayer">
          <p>BUY NOW</p>
        </div></a>
        <img src="images/ln6.jpg" data-aos="fade-up">
      </div>

      <div>
        <a href="All.php"><div class="novellayer">
          <p>BUY NOW</p>
        </div></a>
        <img src="images/ln7.jpg" data-aos="fade-up">
      </div>

      <div>
        <a href="All.php"><div class="novellayer">
          <p>BUY NOW</p>
        </div></a>
        <img src="images/ln8.jpg" data-aos="fade-up">
      </div>

      <div>
        <a href="All.php"><div class="novellayer">
          <p>BUY NOW</p>
        </div></a>
        <img src="images/ln9.jpg" data-aos="fade-up">
      </div>

      <div>
        <a href="All.php"><div class="novellayer">
          <p>BUY NOW</p>
        </div></a>
        <img src="images/ln10.jpg" data-aos="fade-up">
      </div>

      <div>
        <a href="All.php"><div class="novellayer">
          <p>BUY NOW</p>
        </div></a>
        <img src="images/ln11.jpg" data-aos="fade-up">
      </div>

      <div>
        <a href="All.php"><div class="novellayer">
          <p>BUY NOW</p>
        </div></a>
        <img src="images/ln12.jpg" data-aos="fade-up">
      </div>

    </div>


    <?php
    require 'footer.php';
     ?>

     <script src="src=https://code.jquery.com/jquery-3.3.1.js"></script>
     <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
   <script>
    AOS.init({
      duration:500,
    });
   </script>

  </body>
</html>
