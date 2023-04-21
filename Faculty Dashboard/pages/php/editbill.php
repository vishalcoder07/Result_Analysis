<?php
session_start();
if(isset($_GET["edit"]))
{
    $year=$_GET["Year"];
    $month=$_GET["Month"];
    $_SESSION["Month"]=$month;
    $_SESSION["Year"]=$year;
    
         
          echo "<script>window.location.href='../Billdetails.php';</script>";

}
?>