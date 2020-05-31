<?php

  require 'header.php';
  include 'conn.php';

 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>PROFILE</title>
    <style>

    #background {
      background-image: url("images/minimalbackground.png");
      background-color: black;
      width: 100%;
      height: 100%;
    }

    .wrapper {
      width: 100%;
      height: 100vh;
      margin-top:80px;
    }

    .ProfileModal {
      margin-top:150px;
      height: 800px;
      width: 1200px;
      background:rgba(0,0,0,1.0);
      margin-left: auto;
      margin-right: auto;
      padding-top: 40px;
      color: #03a9f4;
      font-size: 1.5em;
      position: relative;
      padding-left:40px;
      border: solid #03a9f4;
    }

    .ProfilePicture {
      margin-left:15px;
      border-radius: 100px;
      background-color: grey;
      width: 200px;
      height: 200px;
    }

    .UpdatePic {
      margin-left: auto;
      margin-right: auto;
      border-radius: 100px;
      background-color: grey;
      opacity: 0;
      width: 200px;
      height: 200px;
      position: absolute;
      transition: 0.5s;
      background-image: url("images/camera.jpg");
      background-size: cover;
    }

    .UpdatePic:hover {
      opacity:0.5;
      cursor: pointer;
    }


    .ProfilePicture > img {
      width: 100%;
      height: 100%;
      border-radius: 100px;
    }

    #ProfileUpdate {
      position: absolute;
    }

    input[type='file']{
      display: none;
    }

    #updatelink {
      text-decoration: underline;
      color: #03a9f4;
      font-size: 0.7em;
    }

    #commentshistory {
      width: 750px;
      height: 840px;
      position: absolute;
      margin-top: -795px;
      margin-left: 447px;
      border-left: solid #03a9f4;
      display: grid;
      grid-template-columns: 1fr;
      grid-auto-rows: 200px;
      overflow: auto;
    }


    .commentshistoryblock {
      border-bottom: solid #03a9f4;
      transition: 0.5s;
    }

    .commentshistoryblock:hover {
      background-color: grey;
    }

    #commentshistory::-webkit-scrollbar {
    width: 10px;
    }

    #commentshistory::-webkit-scrollbar-thumb {
      background: #666;
      border-radius: 20px;
    }

    #commentslink {
      text-decoration:none;
      color: #03a9f4;
    }

    #commentstitle {
      height: 50px;
      margin-left: 10px;
      text-decoration: underline;
    }

    #commentshistoryblock > img {
      height: 100%;
      position: absolute;
    }

    #date {
      position: relative;
      margin:0;
      margin-left: 88%;
      font-size: 0.7em;
      margin-top: 75px;
    }

    #nocomment {
      margin-top:50%;
      font-size: 1.5em;
      color: grey;
    }

    #commentstext {
      margin-left: 15px;
    }


    </style>
  </head>
  <body id='background'>
    <div class='wrapper'>
    <div class='ProfileModal'>
      <?php

      $sql = "SELECT * FROM account WHERE Username = '".$_SESSION['username']."'";
      $result = mysqli_query($conn, $sql);

      while ($rows = mysqli_fetch_array($result)) {
      $ProfilePic = $rows['User_image'];
      $DOB = $rows['DOB'];

      list($year , $month , $day) = explode("-",$DOB);


      echo "<div class='ProfilePicture'>";
      echo "<form id='ProfileUpdate' action='ProfilePicUpdate.php' method='post' enctype='multipart/form-data'>";
      echo "<label class='UpdatePic'>";
      echo "<input type='file' name='ProfilePic' required='required' onchange='this.form.submit();'>";
      echo "</label>";
      echo "</form>";
?>
<?php
      if ($ProfilePic == NULL) {
        echo "<img src='images/NoPhoto.png'>";
      }
      else {
        echo "<img src='".$rows['User_image']."'>";
      }
      echo "</div>";




      echo "<br><br><br>";
      //echo "<center>";
      echo "Name:&nbsp;".$rows['Last_Name']."&nbsp;".$rows['First_Name']."";
      echo "<br><br><br>";
      echo "Email:&nbsp;".$rows['Email']."";
      echo "<br><br><br>";
      echo "Birthday:&nbsp;".$month."/".$day."";
      echo "<br><br><br>";
      echo "Age:&nbsp;";
      echo date("Y") - $year;
      echo "<br><br><br>";
      echo "Gender:&nbsp;".$rows['Gender']."";
      echo "<br><br><br>";
      echo "<a id='updatelink' href='UpdateProfileForm.php'>Update Profile</a>";
      echo "<br><br>";
      echo "<a id='updatelink' href='UpdatePasswordForm.php'>Change Password</a>";
    //  echo "</center>";

}
      ?>


          <?php

          $sql = "SELECT * FROM comments
                  JOIN account
                  ON comments.User_ID = account.User_ID
                  JOIN lnovels
                  ON comments.LN_NO = lnovels.LN_NO
                  WHERE account.Username = '".$_SESSION['username']."'";
          $result = mysqli_query($conn, $sql);

            echo "<div id='commentshistory'>";



              if (mysqli_num_rows($result) > 0) {
                while ($rows = mysqli_fetch_array($result)) {
                echo "<div class='commentshistoryblock'><a id='commentslink' href='".$rows['Comment_Link']."'>

                      <div id='commentstitle'>NOVEL Title:&nbsp;".$rows['LN_Name']."</div>
                      <p id='commentstext'>".$rows['Comment_Text']."</p>
                      <p id='date'>".$rows['Comment_Date']."</p>

                </a></div>";
              }

            }

            else {
              echo "<center><p id='nocomment'>NO COMMENT</p></center>";
            }



            echo "</div>";

           ?>

    </div>
  </div>
  </body>
</html>
