<?php
session_start(); 
include('../../Admin Login/Connection.php');

if(isset($_POST['submit']))
{
  $password1=$_POST["password1"];
  $password2=$_POST["password2"];
  if($password1==$password2)
  {
    $crypass=password_hash($password1,PASSWORD_BCRYPT);
    $id=$_SESSION["id"];
    $q="UPDATE `faculty_login` SET `Password` = '$crypass' WHERE `faculty_login`.`Faculty_id` = '$id'";
    if($con->query($q)===TRUE)
    {
      echo "<script>alert('Password Updated successfully');window.location.href='../index.php'</script>";
      session_destroy();
    }
    else
    {
      echo "<script>alert('Someting went wrong! try after sometime ');window.location.href='../index.php'</script>";
    }
    
  }
  else
  {
    echo "<script>alert('Password Not Match');window.location.href='../setpass.php'</script>";
  }
 
}
?> 