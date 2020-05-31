<?php
require 'header.php';
 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Payment</title>
    <style>
    #background {
      background-image: url("images/minimalbackground.png");
      background-color: black;
      width: 100%;
      height: 100%;
    }

    .checkout-form {
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

    .checkout-form h1 {
      margin:0 0 30px;
      padding:0;
    }

    .checkout-form .inputBox {
      position: relative;
    }
    .checkout-form .inputBox input {
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

    .checkout-form .inputBox label {
      position: absolute;
      top:0;
      left:0;
      padding:10px 0;
      font-size: 16px;
      pointer-events: none;
      transition: .5s;
    }

    .checkout-form .inputBox input ~ label
   {
      top:-18px;
      left:0;
      color: red;
      font-size:12px;
    }

    .checkout-form .inputBox input:valid ~ label
   {

      color: #03a9f4;

    }

    .checkout-form input[type="submit"] {
      background:transparent;
      border:none;
      outline:none;
      color:white;
      background:#03a9f4;
      padding: 10px 20px;
      cursor: pointer;
      border-radius: 5px;
    }

    #Pay-now {
      position:absolute;
      padding:10px;
      padding-top:20px;
      padding-bottom:20px;
      width:50%;
      border-style: none;
      background-color: #03a9f4;
      cursor:pointer;
      transition: 0.5s;
      font-size: 1.2em;
      margin-left: 55px;
    }

    #Pay-now:hover {
      background-color:orange;
    }

    #visa-logo {
      width: 170px;
      height: 50px;
      margin-bottom: 20px;
    }

    #visa-logo img {
      width: 100%;
      height: 100%;
    }


    </style>
  </head>
  <body id='background'>



    <div id='wrapper'>

        <div class="checkout-form">
        <center>
          <h1>CHECK OUT</h1>
        </center>
        <div id='visa-logo'><img src="images/visa.png"></div>
        <form action="Afterpayment.php" method="post" id="pay-now-form">
          <?php

          echo "<input type='hidden' name='length' value='".$_POST['length']."'>";
          for ($i=0; $i < $_POST['length'] ; $i++) {
            echo "<input type='hidden' name='cart-id[]'";
            echo "value ='".$_POST['cart-id'.$i.'']."'>";
            echo "<input type='hidden' name='LN-NO[]'";
            echo "value ='".$_POST['LN-NO'.$i.'']."'>";
            echo "<input type='hidden' name='LN-Quantity[]'";
            echo "value ='".$_POST['LN-Quantity'.$i.'']."'>";
            echo "<input type='hidden' name='LN-Price[]'";
            echo "value ='".$_POST['LN-Price'.$i.'']."'>";
          }

           ?>
            <div class="inputBox">
              <input type="text" name="card-no" required="required" autocomplete="off" pattern="[0-9]{16}" title="Format: 16 numbers length">
              <label><span style="color:red;">*</span> Card number</label>
            </div>
            <div class="inputBox">
              <input type="text" name="card-name" required="required" autocomplete="off">
              <label><span style="color:red;">*</span> Name on card</label>
            </div>
            <div class="inputBox">
              <input type="text" name="card-date" required="required" pattern="[0-1][1-9]/[0-9]{2}" autocomplete="off" title="Format: MM/YY">
              <label><span style="color:red;">*</span> Expiration Date</label>
            </div>
            <div class="inputBox">
              <input type="text" name="card-CVV" required="required" pattern="[0-9]{3}" autocomplete="off" title="Format: XXX">
              <label><span style="color:red;">*</span> CVV</label>
            </div>
            <input type="submit" value="PAY NOW" id="Pay-now">
        </form>







    </div>
</div>

  </body>
</html>
