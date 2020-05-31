<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>SIGN UP</title>

    <style>
    .background {
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
      width: 400px;
      margin-top:40px;
      margin-left: 35%;
      background: rgba(0,0,0,.5);
      color: white;
      padding:60px;
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
      top:-10px;
      left:0;
      font-size: 16px;
      pointer-events: none;
      color: #03a9f4;
      transition: .5s;
    }

    .login-form .inputBox input:invalid ~ label {
      color:red;
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

    @media screen and (max-width:600px) {
      .login-form {
        margin-left:0%;
      }

    }

    #alarms {
      color: red;
      margin:0;
      font-size: 0.7em;
      margin-top: 10px;
    }


    </style>
  </head>
  <body class="background">

    <div class="header">
    <a href=homepage.php><img src="images/logo.png"></a>
    <a class="right" href=login.php>SIGN IN</a>
  </div>

    <div class="login-form">
    <center>
      <h1>SIGN UP</h1>
    </center>
    <form action="insert.php" method="post" onsubmit="return Error(this)">
      <form>
        <div class="inputBox">
          <input type="text" name="username" id="username" required="required" pattern="(?=.*\d)(?=.*[A-Za-z]).{8,}" title="Must contain at least one number and letter">
          <label>Username</label>
        </div>
        <div class="inputBox">
          <input type="text" name="firstname" id="firstname" required="required">
          <label>First Name</label>
        </div>
        <div class="inputBox">
          <input type="text" name="lastname" id="lastname" required="required">
          <label>Last Name</label>
        </div>
        <div class="inputBox">
          <input type="password" name="password" id="password" required="required" pattern="(?=.*\d)(?=.*[A-Za-z]).{8,}" title="Must contain at least one number and letter">
          <label>Password</label>
        </div>
        <div class="inputBox">
          <input type="password" name="confirmpassword" id="confirmpassword" required="required">
          <label>Confirm Password</label>
        </div>
        <div class="inputBox">
          <input type="email" name="email" id="email" required="required">
          <label>Email</label>
        </div>
        <div class="inputBox">
          <input type="date" name="dob" id="dob" required="required" min="1900-01-01" max="2006-12-31">
          <label>Date of Birth</label>
        </div>
        <div>
          <input type="radio" name="gender" id="gender" required="required" value="Male">
          Male
        </div>
        <br>
        <div>
          <input type="radio" name="gender" id="gender" required="required" value="Female">
          Female
        </div>
        <br>
        <input type="submit" name="signup" value="SIGN UP" onclick="return Error()">
    </form>
    <p id='alarms'></p>
    </div>

    <script>
    function Error() {

        var username = document.getElementById("username").value;
        var firstname = document.getElementById("firstname").value;
        var lastname = document.getElementById("lastname").value;
        var password = document.getElementById("password").value;
        var confirmpassword = document.getElementById("confirmpassword").value;
        var email = document.getElementById("email").value;
        var dob = document.getElementById("dob").value;
        var gender = document.getElementById("gender").value;


        if (username.length < 8){
          document.getElementById('alarms').innerHTML = "* Username should at least contains 8 characters";
          return false;
        }
        if (firstname == ""){
          document.getElementById('alarms').innerHTML = "* Please fill in First Name field";
          return false;
        }
        if (lastname == ""){
          document.getElementById('alarms').innerHTML = "* Please fill in Last Name field";
          return false;
        }
        if (password.length < 8){
          document.getElementById('alarms').innerHTML = "* Passwords should at least contains 8 characters";
          return false;
        }
        if (confirmpassword.length < 8){
          document.getElementById('alarms').innerHTML = "* Confirm Passwords should at least contains 8 characters";
          return false;
        }
        if (email == ""){
          document.getElementById('alarms').innerHTML = "* Please fill in Email Field";
          return false;
        }

        else {
          document.getElementById('alarms').innerHTML = "";
        }

    }

    </script>
  </body>
</html>
