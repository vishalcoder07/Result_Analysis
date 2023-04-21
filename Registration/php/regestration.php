<?php
session_start(); 
include('../../php/Connection.php');

if(isset($_POST['submit']))
{
    $username= $_POST["username"]; 
    $password1=$_POST["password1"]; 
    $password2=$_POST["password2"];

    $q0="SELECT * FROM `faculty_login` WHERE `Faculty_id` = '$username'"; 
    $result=$con->query($q0);
    if($result->num_rows>0)
    { while($row=$result->fetch_assoc())
        {
         
        $d_username=$row["Password"];
   
      if($d_username!='')
        {
            $_SESSION["status"]="already registered"; 
            $_SESSION["status_msg"]="";
            $_SESSION["status_code"]="error";
      
            
      echo "<script>window.location.href='../index.php';</script>";

          
        }
        else
        {
            if($password1==$password2)
            {
                $crypass=password_hash($password1,PASSWORD_BCRYPT);
             
            $q1="UPDATE `faculty_login` SET `Password` = '$crypass' WHERE `faculty_login`.`Faculty_id` = '$username'"; 
            $result=$con->query($q1);
            $_SESSION["status"]="Registered Successfuly"; 
            $_SESSION["status_msg"]="You can now login from login page";
            $_SESSION["status_code"]="success";
                 echo "<script>window.location.href='../index.php';</script>";
            
            }
            else{
                $_SESSION["status"]="password not Matched"; 
                $_SESSION["status_msg"]="";
                $_SESSION["status_code"]="error";
                     echo "<script>window.location.href='../index.php';</script>";


            
            }
        }
    }
    }
    else
    {   $_SESSION["status"]="Wrong username"; 
        $_SESSION["status_msg"]="";
        $_SESSION["status_code"]="error";
             echo "<script>window.location.href='../index.php';</script>";
    
    }

}
?> 