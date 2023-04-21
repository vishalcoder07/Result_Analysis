<?php
session_start();
include('./Connection.php');

if(isset($_GET["Up"]))
{    
  $Thrate=$_GET["Thrate"];
  $Prrate=$_GET["Prrate"];
  $Limit=$_GET["Limit"];
  $Thr=$_GET["Thr"];

$Prr=$_GET["Prr"];
$Lim=$_GET["Lim"];


$q="Update rate_details SET Th_rate='$Thr', Pr_rate='$Prr', `Limit`='$Lim' WHERE `Sr_no`='1'";
if ($con->query($q) === TRUE) {
    $_SESSION["status"]="Successful!";
    $_SESSION["status_msg"]="Rate Updated Successfully";
    $_SESSION["status_code"]="success";
 
  echo "<script>window.location.href='../Edit rate.php';</script>";
   
  } else {
    $_SESSION["status"]="ERROR!";
    $_SESSION["status_msg"]="Rate  can not Updated  Successfully ";
    $_SESSION["status_code"]="error";
    echo "<script>window.location.href='../Edit rate.php';</script>";
 
  }
}
?>