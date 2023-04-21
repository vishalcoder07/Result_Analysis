<?php
session_start(); 
include('../../Admin Login/Connection.php');

if(isset($_POST['submit']))
{
  $username=$_POST["Username"];
  // $pass=$_POST["Password"];
  $q="Select * from faculty_login where Faculty_id='$username' ";
  $result=$con->query($q);
  if($result->num_rows > 0)
  {
    while($row=$result->fetch_assoc())
    {
       $d_username=$row["Faculty_id"];
       $email=$row["Email"];
       $fname=$row["First_name"];
       $mname=$row["Middle_name"];
       $lname=$row["Last_name"];
       $name=$fname." ".$lname;
       $otp=rand(100000,999999);
       $sub="OTP VERIFICATION";
       $Msg=" Dear ".$name.PHP_EOL." Your otp is ".$otp." . Do not share it with anyone by means. This is confidential and to be used by only you. ";
       $_SESSION["otp"]=$otp;
       $_SESSION["id"]=$d_username;
       if(mail($email,$sub,$Msg))
       {
      
        echo "<script>window.location.href='../otp.php';</script>";
       }
       else
       {
        echo "<script>alert('Something went wrong! please try after some time ');window.location.href='../Forgotpass.php'</script>";
       }
     
    

    }
  }
  else{
    echo "<script>alert('invalid Username');window.location.href='../Forgotpass.php'</script>";
  }  
}
?> 