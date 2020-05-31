<?php
  session_start();

  echo "<script>alert('You already logged out! Thank you ".
  $_SESSION['username'] ."!')</script>";

  session_destroy();
  session_unset();

  echo "<script>window.location.href='login.php'</script>";



 ?>
