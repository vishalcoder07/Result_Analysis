<?php
session_start();
include('./Connection.php');
$Month=$_SESSION["Month"];
$Year=$_SESSION["Year"];
$Faculty_id=$_SESSION["Faculty_id"];
$tablename=$Faculty_id.$Month.$Year;
$billtable=$Faculty_id."Bill";
$q="Select Count(Hours) As prcount From $tablename where Hours=2";

$result=$con->query($q);
$con->error;
 while($row=$result->fetch_assoc())
 {
     $prcount=$row["prcount"];
 }
 
 $q2="Select Count(Hours) As thcount From $tablename where Hours=1";

$result2=$con->query($q2);
 while($row=$result2->fetch_assoc())
 {
     $thcount=$row["thcount"];
 }
$q3="Select * from rate_details where Sr_no =1";
$result3=$con->query($q3);
while($row=$result3->fetch_assoc())
{
    $Th_rate=$row["Th_rate"];
    $Pr_rate=$row["Pr_rate"];
    
}
$prhours=$prcount*2;
$thhours=$thcount;
$totalhours=$prhours+$thhours;

$pramount=$prhours*$Pr_rate;
$thamount=$thhours*$Th_rate;
$totalamount=$pramount+$thamount;

$q4="Update $billtable Set Total_th_hours='$thhours', Total_pr_hours='$prhours', Th_rate='$Th_rate', Pr_rate='$Pr_rate', Total_amount_of_th='$thamount', Total_amount_of_pr='$pramount', Total_amount='$totalamount' where Bill_id='$tablename'";

if ($con->query($q4) === TRUE) {

  echo "<script>window.location.href='../Bill.php';</script>";
   
  } else {

    $_SESSION["status"]="ERROR!";
    $_SESSION["status_msg"]=" Something went wrong!!! ";
    $_SESSION["status_code"]="error";

//    echo "<script>window.location.href='../Billdetails.php';</script>";
 
  }
?>
