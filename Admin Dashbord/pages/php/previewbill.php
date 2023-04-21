<?php
session_start();
if(isset($_GET["set"]))
{
$_SESSION["Name"]=$_GET["Name"];
$_SESSION["Month"]=$_GET["Month"];
$_SESSION["Year"]=$_GET["Year"];

echo "<script>window.location.href='../Viewbill.php';</script>";
}
?>