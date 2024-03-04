<?php
$server="localhost";
$username_details="root";
$password="";
$db="cis";

$conn=new mysqli("$server","$username_details","$password","$db") or die("mysqli_error");
?>