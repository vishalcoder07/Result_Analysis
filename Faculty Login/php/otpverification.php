<?php
session_start(); 
include('../../Admin Login/Connection.php');

if(isset($_POST['submit']))
{
   $uotp=$_POST["otp"];
   $ootp=$_SESSION["otp"];
   if($uotp==$ootp)
   {
     
      echo "<script>window.location.href='../setpass.php';</script>";
      $_SESSION["otpsuccess"]=1;
    
   }
   else
   {
      echo "<script>alert('invalid otp');window.location.href='../otp.php'</script>";
   }

}
?> 