<?php

$conn = mysqli_connect("localhost", "root", "root", "officialDB");

if(mysqli_connect_errno())
{
echo "Failed to connect to MySQL: ".mysqli_conect_error();
}
?>
