<?php
session_start();
session_write_close();
include 'conn.php';
?>
<style>

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

.header #right1 {
  float: right;
  color: white;
  text-decoration: none;
  font-size: 1em;
  text-align: center;
  padding: 30px;
  margin-left: 25px;
}

#right1 a {
  text-decoration: none;
  color: white;
}

.header .right3 {
  float: right;
  color: white;
  text-decoration: none;
  font-size: 1em;
  text-align: center;
  padding: 30px;
  margin-left: 25px;
}

.right3 a {
  text-decoration: none;
  color: white;
}

.header #right2 {
  float: right;
  color: white;
  text-decoration: none;
  font-size: 1em;
  text-align: center;
  padding: 30px;
  margin-left: 25px;
}

#right2 a {
  text-decoration: none;
  color: white;
}

@media screen and (max-width:500px) {
    .header {
      opacity:0.5;
      pointer-events: none;
    }
}
#logout {
  position: fixed;
  z-index:99;
  background-color: black;
  float: right;
  width: 120px;
  height: 100px;
  top:0;
  right:0;
  margin-top: 80px;
  display: none;
}

#logout a {
  text-decoration: none;
  color: white;
}

#logout p {
  font-size: 1em;
  padding-left: 30px;
  margin-bottom:30px;
}

.header #right1:hover ~ #logout {
  display: block;
}

#logout:hover {
  display: block;
}

#Cart {
  position: fixed;
  z-index:99;
  background-color: black;
  float: right;
  width: 120px;
  height: 60px;
  top:0;
  right:180px;
  margin-top: 80px;
  display: none;
}

#Cart a {
  text-decoration: none;
  color: white;
}

#Cart p {
  font-size: 1em;
  padding-left: 30px;
}

.header #right2:hover ~ #Cart {
  display: block;
}

#Cart:hover {
  display: block;
}

#userimage {
  width: 70px;
  height: 80px;
  border-radius: 70px;
}

#userimage > img {
  width: 100%;
  height: 100%;
}


</style>

<div class="header">

<a href=homepage.php#top><img src="images/logo.png"></a>
<div id="right1">
<?php
if(isset($_SESSION['username']) and $_SESSION['role'] === "1") {
  echo $_SESSION['username'];
}
elseif(isset($_SESSION['username']) and $_SESSION['role'] === "0") {
  echo "ADMIN";
}

else {
  echo "<a href='login.php'>";
  echo "LOGIN";
  echo "</a>";
}
?>
</div>

<?php
if (isset($_SESSION['username'])) {
$sql = "SELECT SUM(Quantity) AS TotalItems FROM cart JOIN account
        ON cart.User_ID = account.User_ID
        WHERE account.Username = '".$_SESSION['username']."'";

$result = mysqli_query($conn, $sql);
$rows = mysqli_fetch_array($result);
$sum = $rows['TotalItems'];


if ($sum > 0) {
  echo "<a id='right2' style='color:#03a9f4;' href=homepage.php#LN>LIGHT NOVELS !</a>";
}
else {
  echo "<a id='right2' href=homepage.php#LN>LIGHT NOVELS</a>";
}
}
else {
  echo "<a id='right2' href=homepage.php#LN>LIGHT NOVELS</a>";
}

?>
<a class="right3" href=homepage.php#FEATURED>FEATURED</a>
<a class="right3" href=homepage.php#NEWS>NEWS & EVENTS</a>

<?php
if(isset($_SESSION['username'])){
echo "<div id='Cart'>
<a href='AddtoCart.php'><p>CART";
?>
<?php
if ($sum > 0) {
  echo "(".$sum.")";
}
else {
  echo "(0)";
}
echo "</p></a>
</div>
";}
?>
<?php
if(isset($_SESSION['username'])){
echo "<div id='logout'>
<a href='profile.php'><p>PROFILE</p></a>
<a href='logout.php'><p>LOGOUT</p></a>
</div>
";}

?>
</div>
