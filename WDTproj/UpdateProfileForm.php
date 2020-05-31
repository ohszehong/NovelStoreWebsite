<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>LOGIN</title>
    <style>

    #background {
      background-image: url("images/minimalbackground.png");
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

    .login-form {
      position: absolute;
      top:50%;
      left:50%;
      transform: translate(-50%,-50%);
      width: 400px;
      background: rgba(0,0,0,.5);
      color: white;
      padding:40px;
      box-sizing: border-box;
      box-shadow: 0 15px 25px rgba(0, 0, 0, 0.5);
      border-radius: 10px;
    }

    .login-form h1 {
      margin:0 0 30px;
      padding:0;
    }

    .login-form .inputBox {
      position: relative;
    }
    .login-form .inputBox input {
      width: 100%;
      padding:10px 0;
      font-size: 16px;
      margin-bottom: 30px;
      border:none;
      outline: none;
      background:transparent;
      color: white;
      border-bottom: 1px solid white;
      letter-spacing: 1px;
    }

    .login-form .inputBox label {
      position: absolute;
      top:0;
      left:0;
      padding:10px 0;
      font-size: 16px;
      pointer-events: none;
      transition: .5s;
    }

    .login-form .inputBox input:focus ~ label,
    .login-form .inputBox input:valid ~ label {
      top:-18px;
      left:0;
      color:#03a9f4;
      font-size:12px;
    }

    .login-form input[type="submit"] {
      background:transparent;
      border:none;
      outline:none;
      color:white;
      background:#03a9f4;
      padding: 10px 20px;
      cursor: pointer;
      border-radius: 5px;
    }

    #Text {
      min-height: 200px;
      width: 100%;
    }

    #alarms {
      color: red;
      margin:0;
      font-size: 0.7em;
      margin-top: 50px;
    }

    </style>
  </head>
  <body id="background">

    <?php
    require 'header.php';
    ?>

    <div class="login-form">
    <center>
      <h1>Update Profile</h1>
    </center>
    <form action="UpdateProfile.php" method="post" name="forms">
        <div class="inputBox">
          <input type="text" name="FirstName">
          <label>First Name</label>
        </div>
        <div class="inputBox">
          <input type="text" name="LastName">
          <label>Last Name</label>
        </div>
        <div class="inputBox">
          <input type="email" name="NewEmail">
          <label>New Email</label>
        </div>
        <input type="submit" name="UpdateProfile" value="Update">
    </form>
    <p id='alarms'>*Leave the field blank if u wish not to change</p>
    </div>

<script>
/*function validateForm() {
    var x = document.forms["forms"]["OldPassword"].value;
    var y = document.forms["forms"]["NewPassword"].value;
    if (x == null and y !== null) {
        alert("Please insert old password!");
        windows.href.location = "profile.php";
        return false;
    }
    else if (x !== null and y == null) {
      alert("Please insert new password!");
      windows.href.location = "profile.php";
      return false;
    }
}*/

</script>


  </body>
</html>
