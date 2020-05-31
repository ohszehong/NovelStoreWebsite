<?php

include("conn.php");

$sql = "SELECT Username, Password, Email FROM account";
$result = mysqli_query($conn, $sql);

$UserPassword = $_POST['password'];

while ($rows = mysqli_fetch_array($result)) {

if ($_POST['password'] != $_POST['confirmpassword']) {
  echo "<script>alert('Password and confirmed password are not same!');";
  die("window.history.go(-1);</script>");
}
elseif ($_POST['username'] == $rows['Username'] ) {
  echo "<script>alert('Username taken! Try other username');";
  die("window.history.go(-1);</script>");
}
elseif ($_POST['email'] == $rows['Email'] ) {
  echo "<script>alert('Email is already registered! Try other email');";
  die("window.history.go(-1);</script>");
}
else {

$sql = "INSERT INTO Account (Username, First_Name, Last_Name, Password, Email, DOB, Gender)

VALUES

('$_POST[username]', '$_POST[firstname]', '$_POST[lastname]', '".md5($UserPassword)."', '$_POST[email]', '$_POST[dob]', '$_POST[gender]')";

}
}


if (!mysqli_query($conn, $sql)) {
die('Error: ' .mysqli_error($conn));
}

mysqli_close($conn);
 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta http-equiv="refresh" content="5;url=login.php" />
    <title>SUCCESS</title>
    <style>
    .background {
      background-color: black;
      width: 100%;
      height: 100%;
    }

    .header {
      width: 100%;
      height: 80px;
      background-color: black;
      overflow: hidden;
      position: fixed;
      top: 0;
      left: 0;
      transition: 1s;
      z-index: 99;
    }

    .header img {
      height: 100%;
      float: left;
    }

    .header .right {
      float: right;
      color: white;
      text-decoration: none;
      font-size: 1em;
      text-align: center;
      padding: 30px;
      margin-left: 25px;
    }

    @media screen and (max-width:400px) {
        .header {
          opacity:0.5;
        }
    }

    body {
      margin:0;
      padding:0;
    }

    .thanks {
      width: 400px;
      height: 400px;
      background-color:white;
      font-size: 16px;
      text-align: center;
      padding-top: 150px;
      margin-left: auto;
      margin-right:auto;
    }

    #thanks {
      margin-top: 100px;

    }
    </style>
  </head>
  <body class="background">
    <div class="header">
    <a href=homepage.php><img src="images/logo.png"></a>
    <a class="right" href=login.php>SIGN IN</a>
    </div>

    <center>
      <img id='thanks' src="images/thanksbanner.jpg">
    </center>

  </body>
</html>
